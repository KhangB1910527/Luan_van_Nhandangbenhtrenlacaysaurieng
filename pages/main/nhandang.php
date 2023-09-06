<?php
    if( isset($_SESSION['dangnhap'])){
?>
<div class='nhandang'>

    <div class='upload_part'>
        <button class='upload_button' id="upload_button">Chọn file ảnh lá sầu riêng..</button>
        <div class='upload_hint' id='upload_hint'>
            Vui lòng chọn ảnh rỏ nét, và chỉ chọn mỗi 1 lá bệnh để nhận dạng được chính xác!
        </div>
        <form action="/" method="POST" enctype="multipart/form-data" id='form'>
            <input type="file" name="file" id="fileinput" accept="image/*" style="display:none">
        </form>
    </div>
    
    <div class='result_part'>
        <div class='result_title'><b>Kết quả nhận dạng</b></div>
        <div class='result_id' id="result_info">_____</div>
        <img style="max-width:300px; border-radius:1rem"
             src="images/anhtrong.png"
             alt="User Image" id="display_image">
    </div>
</div>
<?php 
    }else{
?>
<div class="canhbaodangnhap">
    <p>Để sử dụng chức năng nhận dạng vui lòng <a href="index.php?quanly=dangnhap">đăng nhập</a></p>
    <p>Nếu chưa có tài khoản xin vui lòng đăng ký <a href="index.php?quanly=dangky">tại đây</a></p>
</div>
<?php } ?>


<script>
    const FLOWER_CLASS = {
        0: 'Cháy lá',
        1: 'Đốm lá',
        2: 'Đốm rong',
        3: 'Không bệnh',
        4: 'Không thể nhận dạng',
        5: 'Rầy xanh hại lá',
        6: 'Thán thư',
        7: 'Vàng lá thối rễ',
       
        
    };
    const FLOWER_CLASS1 = {
        0: '48',
        1: '47',
        2: '45',
        3: 'khongbenh',
        4: '#',
        5: '46',
        6: '44',
        7: '43',
       
        
    };
    
    // Load model
     $("document").ready (async function() {
        model = await tf.loadLayersModel('http://localhost/luan_van/public/models/tfjs_model/model.json');
        console.log('Load model');
        console.log(model.summary());
    });

    $("#upload_button").click(function() {
        $("#fileinput").trigger('click');
    });

    async function predict() {

    // 1. Chuyen anh ve tensor
     let image = document.getElementById("display_image");
     let img = tf.browser.fromPixels(image);
     let normalizationOffset = tf.scalar(255/2); // 127.5
     let tensor = img
            .resizeNearestNeighbor([224, 224])
            .toFloat()
            .sub(normalizationOffset)
            .div(normalizationOffset)
            .reverse(2)
            .expandDims();

    // 2. Du doan
    let predictions = await model.predict(tensor);
    predictions = predictions.dataSync();
    console.log(predictions);


        let top5 = Array.from(predictions)
        .map(function (p, i) {
            if(p > 0.51){
                return {
                    
                    probability: p,
                    className: FLOWER_CLASS[i],
                    className1: 'index.php?quanly=loaibenh&id=' + FLOWER_CLASS1[i],
                };
            }
            
            
            
        }).sort(function (a, b) {
            return b.probability - a.probability;
        });

        console.log(top5);
        $("#result_info").empty();
        top5.forEach(function (p) {
            if(p.className == 'Không thể nhận dạng'){
                    $("#result_info").append(`
                    <li class="phantram">Không thể nhận dạng được hình ảnh của bạn, xin vui lòng cung cấp ảnh khác!</li>`);
                }else if(p.className == 'Không bệnh'){
                    $("#result_info").append(`
                    <li class="phantram">Lá sầu riêng của bạn không bị bệnh hại nào.</li>`);
                }else{
                    $("#result_info").append(`
                  <li class="phantram">Kết quả nhận dạng cho thấy lá sầu riêng của bạn đang bị bệnh
                  <a href="${ p.className1}">${p.className}</a>: ${p.probability.toFixed(2)*100}%</li>`);
                }
                
            });
        
        };


    $("#fileinput").change(function () {
        let reader = new FileReader();
        reader.onload = function () {
            let dataURL = reader.result;

            imEl = document.getElementById("display_image");
            imEl.onload = function () {
               predict();
            }
            $("#display_image").attr("src", dataURL);
            $("#result_info").empty();




        }

        let file = $("#fileinput").prop("files")[0];
        reader.readAsDataURL(file);
    });


</script>