<script>
    $(() => {
        const lengthImages = $('#length-images').val() - 1;
        var index = 0;
        const slide = () => {
            return setInterval(() => {
                $(`#image-${index+1}`).removeClass("hidden");
                $(`#image-${index}`).addClass("hidden");
                index++;
                if (index > lengthImages) {
                    $(`#image-0`).removeClass("hidden");
                    $(`#image-${lengthImages}`).addClass("hidden");
                    index = 0;
                }
            }, 3000);
        }
        const do = slide();
        $('#wrap-imgs').mouseover(() => {
            clearInterval()
        })
        $('#wrap-imgs').mouseout(() => {

        })
    })
</script>
