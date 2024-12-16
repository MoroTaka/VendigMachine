

const delete_Btns = document.querySelectorAll('.deleteBtn');

delete_Btns.forEach(function (delete_Btn) {
    delete_Btn.addEventListener('click', function(e) {
    
       const kakunin =  window.confirm('削除してもよろしいですか？');

       if(kakunin) {

        return window.confirm('削除しました');

       }else {

        return e.preventDefault();

       }

    });

});


