
/*<!-- BENEFITS -->
*/
$(document).ready(function () {
    var ctr = 0;
    var number = 0;
    var arrayOfWord = [];
    var inputElement = document.getElementById('benefits');
    $('#benefits').on('keydown', function (e) {
        if (e.which == 13) {
            number++;
            arrayOfWord.push(document.getElementById("benefits").value);
            inputElement.value = "";
            console.log(arrayOfWord);

            let html = "<div class='row rowremovebenefits' value='ctr'><label class='form-control text content2' id='ctr'>" + number + "." + " " + arrayOfWord[ctr] + "<button class='btn-remove' value='haha'>Remove</button></label></div>";

            console.log($('.lstBenefit'));
            console.log($('ctr'));

            $('.lstBenefit').append(html);

            ctr++;
        }
    });

    $('.lstBenefit').on('click', '.btn-remove', function (e) {
        $(this).parent().parent().remove()
    });

});

/*<!-- JOB DESCRIPTION -->*/

$(document).ready(function () {
    /*var ctr = 0;
    var number=0;
    var arrayOfWord = [];*/
    $('#jobdescription').on('keydown', function (e) {
        if (e.which == 13) {
            let inputElement = $(this).val();
            /*number++;
            arrayOfWord.push(document.getElementById("jobrequirement").value);
                inputElement.value = "";
                console.log(arrayOfWord);*/

            let html = "<div class='row rowremovejobdescription' maxlength='55' value='ctr'><label class='form-control desc content2' id='ctr'>" + inputElement + "</label></div>";

            console.log($('.lstJobDescription'));

            $('.lstJobDescription').append(html);

            $(this).val("");
            /*ctr++;*/
        }
    });

    $('.lstJobRequirement').on('click', '.btn-remove', function (e) {
        $(this).parent().parent().remove()
    });

});

/*<!-- CHECKBOX SHIFT WORK - DISABLED WORKING HOUR -->*/

$(document).on('click', '.cbShiftsalary', function () {
    var target = $(this).data('target');
    if ($(this).is(':checked')) {
        $('#' + target).addClass('disabled').css('pointerEvents', 'none');
    }
    else {
        $('#' + target).removeClass('disabled').css('pointerEvents', 'auto');;
    }
});

/*<!-- BUTTON INFO HOVER-->*/

$(document).ready(function () {
    $(".btninfo").mouseover(function (e) {
        $('.labelscs').css('opacity', 1);
    });

    $(".btninfo").mouseleave(function (e) {
        $('.labelscs').css('opacity', 0);
    });
})

/*<!-- CHECKBOX PROBATION PERIOD - ENABLE PROBATION PERIOD -->*/

$(document).on('click', '.cbProbperiod', function () {
    var target = $(this).data('target');
    if ($(this).is(':checked')) {
        $('#' + target).removeClass('disabled').css('pointerEvents', 'auto');
    }
    else {
        $('#' + target).addClass('disabled').css('pointerEvents', 'none');
    }
});

/*<!-- show PANEL GENERATE OFFER LETTER-->*/

$(document).ready(function () {
    $(".btn-generate").click(function (e) {
        $('.offeractive2').css('display', 'unset');
        $('.panel-h').css('width', 'unset').css('margin-left', '20px');
        $('#offer-tab').css('margin-top', '10%');
    });
})

/*<!-- Display Input File --> */

$(function () {
    $("#upload_link").on('click', function (e) {
        e.preventDefault();
        $("#upload:hidden").trigger('click');
    });
});

$(function () {
    $("#upload_linkk").on('click', function (e) {
        e.preventDefault();
        $("#uploadd:hidden").trigger('click');
    });
});

$(function () {
    $("#upload_linkkk").on('click', function (e) {
        e.preventDefault();
        $("#uploaddd:hidden").trigger('click');
    });
});

$(document).ready(function () {
    $(".btn-generate").click(function (e) {
        $('.offeractive').css('display', 'unset');
    });
})

/*<!-- NON-ACTIVE CLOSE MODAL -->*/

$("#closemodal").modal({
    escapeClose: false,
    clickClose: false,
    showClose: false
});

/*<!-- BUTTON STICKY -->*/

// jQuery(function()
// {
// 	window.onscroll = function(){
// 		scrollFunction();
// 	}

// 	var navbar = document.getElementById('navbarr');

// 	var sticky = navbar.offsetTop;

// 	function scrollFunction()
// 	{
// 		console.log(sticky);
// 		console.log(pageYOffset);
// 		if(window.pageYOffset > (sticky + 65))
// 		{
// 			navbar.classList.add('sticky');
// 			navbar.classList.remove('navbar-margin');
// 		}
// 		else
// 		{
// 			navbar.classList.remove('sticky');
// 			navbar.classList.add('navbar-margin');
// 		}
// 	}
// });

/*<!-- SCROLL -->*/

$(document).ready(function () {
	/*$('.btn-applied').click(function() {
	  $('html, body').animate({
	    scrollTop: $("div#applied-tab").offset().top
	  }, 500);
	}),*/

    $('.btn-schedule').click(function () {
        $('html, body').animate({
            scrollTop: $("div#schedule-tab").offset().top
        }, 500);
        $('.btn-schedule').css('opacity', '1').css("color", "#246BB3");
        $('.btn-line-b').css('opacity', '1').css("background-color", "#04518D");
    }),
        $('.btn-offer').click(function () {
            $('html, body').animate({
                scrollTop: $("div#offer-tab").offset().top
            }, 500);
            $('.btn-offer').css('opacity', '1').css("color", "#246BB3");
            $('.btn-line-c').css('opacity', '1').css("background-color", "#04518D");
        }),
        $('.btn-hire').click(function () {
            $('html, body').animate({
                scrollTop: $("div#hire-tab").offset().top
            }, 500);
            $('.btn-hire').css('opacity', '1').css("color", "#246BB3");
        })
});

/*<!-- Modal - Active Edit Button & Sticky Button -->*/

$(document).ready(function () {
    $(".btn-schedule2").click(function (e) {
        $('.panelbutton').css('z-index', 'unset');
    });

    $(".btn-confirmmodal1").click(function (e) {
        $('.editinterview1').css('display', 'unset').removeClass('disabled');
        $('#schedule-tab').find('input, textarea, select').addClass('disabled').css('pointerEvents', 'none');
        $('.maps1').addClass('disabled').css('pointerEvents', 'none');
        $('.maps2').addClass('disabled').css('pointerEvents', 'none');
        $('.showschedule').addClass('disabled').css('pointerEvents', 'none');
        $('.sticky').css('display', 'none');
    });

    $(".editinterview1").click(function (e) {
        $('#schedule-tab').find('input, textarea, select').removeClass('disabled').css('pointerEvents', 'auto');
        $('.maps1').removeClass('disabled').css('pointerEvents', 'auto');
        $('.maps2').removeClass('disabled').css('pointerEvents', 'auto');
        $('.showschedule').removeClass('disabled').css('pointerEvents', 'auto');
    });

    $(".btn-confirmmodal2").click(function (e) {
        $('.editinterview2').css('display', 'unset').removeClass('disabled');
        $('.tag-size2').addClass('disabled').css('pointerEvents', 'none');
        $('.notes').addClass('disabled').css('pointerEvents', 'none');
        $('.attachment1').addClass('disabled').css('pointerEvents', 'none');
        $('.interviewname').addClass('disabled').css('pointerEvents', 'none');
        $('.batch2').addClass('disabled').css('pointerEvents', 'none');
        $('.timee').addClass('disabled').css('pointerEvents', 'none');
        $('.sticky').css('display', 'none');
    });

    $(".editinterview2").click(function (e) {
        $('.notes').removeClass('disabled').css('pointerEvents', 'auto');
        $('.attachment1').removeClass('disabled').css('pointerEvents', 'auto');
    });

    $(".btn-schedule2").click(function (e) {
        $('.sticky').css('opacity', 0);
    });

    $(".btn-saveinterview").click(function (e) {
        $('.sticky').css('opacity', 0);
    });

    $(".btn-sendoffer").click(function (e) {
        $('.sticky').css('opacity', 0);
    });

    $(".btn-sendcontract").click(function (e) {
        $('.sticky').css('opacity', 0);
    });

    $(".btn-cancelmodal").click(function (e) {
        $('.sticky').css('opacity', 1);
    });

    $(".btnfull").click(function (e) {
        $('.sticky').css('display', 'none');
    });

})

/*<!-- Button Dashboard -->*/
/*
	$(document).ready(function(){
		 $(".thumbnail").mouseover(function(){
		  	$(".thumbnail").css("background-color", "#7BA6D1");


		  	$(".panel-dashboard").css("background-color", "#87B6E6");
		    $(".text-dashboard1").css("color", "white");
		    $(".text-dashboard2").css("color", "white");
		    $(".text-dashboard3").css("font-style", "italic");
	  });
	})

	 $(document).ready(function() {
            $('.btn-dashboard').mouseenter(
               function () {
                  $(this).css({"background-color":"red"});
               },

               function () {
                  $(this).css({"background-color":"blue"});
               }
            );

         });*/

/*<!-- Button Carousel Dashboard -->*/

$(document).ready(function () {
    var itemsMainDiv = ('.MultiCarousel');
    var itemsDiv = ('.MultiCarousel-inner');
    var itemWidth = "";

    $('.leftLst, .rightLst').click(function () {
        var condition = $(this).hasClass("leftLst");
        if (condition)
            click(0, this);
        else
            click(1, this)
    });

    ResCarouselSize();

    $(window).resize(function () {
        ResCarouselSize();
    });

    //this function define the size of the items
    function ResCarouselSize() {
        var incno = 0;
        var dataItems = ("data-items");
        var itemClass = ('.item');
        var id = 0;
        var btnParentSb = '';
        var itemsSplit = '';
        var sampwidth = $(itemsMainDiv).width();
        var bodyWidth = $('body').width();
        $(itemsDiv).each(function () {
            id = id + 1;
            var itemNumbers = $(this).find(itemClass).length;
            btnParentSb = $(this).parent().attr(dataItems);
            itemsSplit = btnParentSb.split(',');
            $(this).parent().attr("id", "MultiCarousel" + id);


            if (bodyWidth >= 992) {
                incno = itemsSplit[6];
                itemWidth = sampwidth / incno;
            }
            else if (bodyWidth >= 768) {
                incno = itemsSplit[3];
                itemWidth = sampwidth / incno;
            }
            else {
                incno = itemsSplit[0];
                itemWidth = sampwidth / incno;
            }
            $(this).css({ 'transform': 'translateX(0px)', 'width': itemWidth * itemNumbers });
            $(this).find(itemClass).each(function () {
                $(this).outerWidth(itemWidth);
            });

            $(".leftLst").addClass("over");
            $(".rightLst").removeClass("over");

        });
    }
    //this function used to move the items
    function ResCarousel(e, el, s) {
        var leftBtn = ('.leftLst');
        var rightBtn = ('.rightLst');
        var translateXval = '';
        var divStyle = $(el + ' ' + itemsDiv).css('transform');
        var values = divStyle.match(/-?[\d\.]+/g);
        var xds = Math.abs(values[4]);
        if (e == 0) {
            translateXval = parseInt(xds) - parseInt(itemWidth * s);
            $(el + ' ' + rightBtn).removeClass("over");

            if (translateXval <= itemWidth / 2) {
                translateXval = 0;
                $(el + ' ' + leftBtn).addClass("over");
            }
        }
        else if (e == 1) {
            var itemsCondition = $(el).find(itemsDiv).width() - $(el).width();
            translateXval = parseInt(xds) + parseInt(itemWidth * s);
            $(el + ' ' + leftBtn).removeClass("over");

            if (translateXval >= itemsCondition - itemWidth / 2) {
                translateXval = itemsCondition;
                $(el + ' ' + rightBtn).addClass("over");
            }
        }
        $(el + ' ' + itemsDiv).css('transform', 'translateX(' + -translateXval + 'px)');
    }

    //It is used to get some elements from btn
    function click(ell, ee) {
        var Parent = "#" + $(ee).parent().attr("id");
        var slide = $(Parent).attr("data-slide");
        ResCarousel(ell, Parent, slide);
    }

});

/*
<!-- TextArea General Information Edit-->*/

function textAreaAdjust(o) {
    o.style.height = "1px";
    o.style.height = (9 + o.scrollHeight) + "px";
}


/*UNIVERSITY*/

$(document).ready(function () {
    $(".update1").click(function (e) {
        $('#modal-detail-update').css('display', 'block');
        $('#modal-detail').css('display', 'none');
    });

    $(".close2").click(function (e) {
        $('#modal-detail-update').css('display', 'none');
        $('#modal-detail').css('display', 'block');
    });


})

$(document).ready(function () {
    $('#province').change(function () {
        if ($(this).val() != '') {
            var value = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                url: "/retrieveCity",
                method: "POST",
                data: { province: value },
                success: function (city) {
                    $("#city").empty();
                    var option = new Option("Select City...", "");
                    $(option).html("Select City...");
                    $("#city").append(option);
                    for (var index in city) {
                        var option = new Option(city[index].name, city[index].id);
                        $(option).html(city[index].name);
                        $("#city").append(option);
                    }
                }
            })
        }
        else {
            $('#city').empty();
            var option = new Option("Select City...", "");
            $(option).html("Select City...");
            $("#city").append(option);
        }
    });
});

