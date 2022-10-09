$(document).ready(function(){
    // get Delete Product
    $('.btn-delete').on('click',function(){
        // get data from button edit
        const id = $(this).data('id');
        // Set data to Form Edit
        $('.uniqueID').val(id);
        // Call Modal Edit
        $('#deleteModal').modal('show');
    });

    $('.btn-logout').on('click',function(){
        // get data from button edit
        const id = $(this).data('id');
        // Set data to Form Edit
        $('.uniqueID').val(id);
        // Call Modal Edit
        $('#logoutModal').modal('show');
        console.log(id);
    });

    var successElement = document.getElementById("success");
    var failElement = document.getElementById("error");
    if(successElement){
        swal({
            text: successElement.innerHTML,
            icon: "success",
        });
    } else if (failElement) {
        swal({
            text: failElement.innerHTML,
            icon: "error",
        });
    }
        
});

function menu(e) {
    $('#' + e).addClass('active');
}

function imagePreview() {
    const gambar = document.querySelector('#gambar')
    const label = document.querySelector('.gambar-label')
    const imgPrev = document.querySelector('.img-preview')
    if(label){
        label.textContent = gambar.files[0].name
    }
    const fileImage = new FileReader()
   fileImage.readAsDataURL(gambar.files[0])

    fileImage.onload = function(e){
        imgPrev.src = e.target.result
    }
}
