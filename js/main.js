$(document).ready(function(){
    $("#search-input").on("keyup", function() {

      var value = $(this).val().toLowerCase()

      if ($(this).val() == 0) {
        $("#search-box").hide()
      }
      else {
        $("#search-box").show()
      }

      $(".search-list li").filter(function() {
        //$productName
        let val = $("#searchName", this).text()

        $(this).toggle(val.toLowerCase().trim().indexOf(value) > -1)
      })

      if ($(".search-list").children(':visible').length == 0) {
        $("#search-box").hide()
      } else {
        $("#search-box").show()
      }

    })

    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#to-top').fadeIn()
        } else {
            $('#to-top').fadeOut()
        }
    })

    $('#to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 400)
        return false
    })
})