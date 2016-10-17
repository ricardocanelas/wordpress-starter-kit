export default {

    init() {

        $('#show-comment-btn').on('click', function(){
            $(this).fadeOut(200);
            $('section#comments').delay(200).fadeIn(300);
        })

    },

};