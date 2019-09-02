$(document).ready(function () {
    $('.pagination ul li a').click(function () {
        $('.pagination ul li a').removeClass("active");
        $(this).addClass("active");
    });
});


var dropdowns = $(".dropdown");
dropdowns.find("dt").click(function () {
    dropdowns.find("dd ul").hide();
    $(this).next().children().toggle();
});
dropdowns.find("dd ul li a").click(function () {
    var leSpan = $(this).parents(".dropdown").find("dt a span");
    $(this).parents(".dropdown").find('dd a').each(function () {
        $(this).removeClass('selected');
    });
    leSpan.html($(this).html());
    if ($(this).hasClass('default')) {
        leSpan.removeClass('selected')
    } else {
        leSpan.addClass('selected');
        $(this).addClass('selected');
    }
    $(this).parents("ul").hide();
});
$(document).bind('click', function (e) {
    if (!$(e.target).parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});


$(document).ready(function () {

    $('.list-pay .item-pay').click(function () {
        var tab_id = $(this).attr('data-tab');

        $('.list-pay .item-pay').removeClass('active');
        $('.tab-content').removeClass('active');

        $(this).addClass('active');
        $("#" + tab_id).addClass('active');
    })

})

$(document).ready(function () {

    $('.list-bank ul li').click(function () {
        var tab_id = $(this).attr('data-tab');
        var data_id = $(this).attr('data-id');
        console.log(data_id);
        $('.list-bank ul li').removeClass('active');
        $('.list-bank .item').removeClass('active');
        $("input[name='bank_id']").val(data_id);

        $(this).addClass('active');
        $("#" + tab_id).addClass('active');
    })

})

var swiper = new Swiper('.swiper-container.slide-book', {
    slidesPerView: 4,
    spaceBetween: 30,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {
        1024: {
            slidesPerView: 4,
            spaceBetween: 30,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 10,
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 10,
        },
        320: {
            slidesPerView: 2,
            spaceBetween: 10,
        }
    }
});


jQuery(document).ready(function ($) {
    $("#menu").mmenu({
        "extensions": [
            "fx-menu-zoom"
        ],
        "counters": true
    });
});

// rating review
var __slice = [].slice;

(function ($, window) {
    var Starrr;

    Starrr = (function () {
        Starrr.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function (e, value) {
            }
        };

        function Starrr($el, options) {
            var i, _, _ref,
                _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.starrr', 'span', function (e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.starrr', function () {
                return _this.syncRating();
            });
            this.$el.on('click.starrr', 'span', function (e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('starrr:change', this.options.change);
        }

        Starrr.prototype.createStars = function () {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='fa .fa-star-o'></span>"));
            }

            return _results;
        };

        Starrr.prototype.setRating = function (rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();

            return this.$el.trigger('starrr:change', rating);
        };

        Starrr.prototype.syncRating = function (rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('fa-star-o').addClass('fa-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('fa-star').addClass('fa-star-o');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('fa-star').addClass('fa-star-o');
            }
        };

        return Starrr;

    })();
    return $.fn.extend({
        starrr: function () {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
            return this.each(function () {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Starrr($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function () {
    return $(".starrr").starrr();
});

$(document).ready(function () {

    var correspondence = ["", "Quá tệ", "Tệ", "Chấp nhận được", "Tốt", "Tuyệt vời"];

    $('.ratable').on('starrr:change', function (e, value) {

        $(this).closest('.evaluation').children('#count').val(value);
        $(this).closest('.evaluation').children('#meaning').html(correspondence[value]);

        var currentval = $(this).closest('.evaluation').children('#count').html();

        var target = $(this).closest('.evaluation').children('.indicators');
        target.css("color", "black");
        target.children('.rateval').val(currentval);
        target.children('#textwr').html(' ');

        if (value < 3) {
            target.css("color", "red").show();
            target.children('#textwr').text('What can be improved?');
        } else {
            if (value > 3) {
                target.css("color", "green").show();
                target.children('#textwr').html('What was done correctly?');
            } else {
                target.hide();
            }
        }
    });

    $('#hearts-existing').on('starrr:change', function (e, value) {
        $('#count-existing').html(value);
    });
});
// end rating review

// show - hide button comment
$(document).ready(function () {
    $("#button").click(function () {
        $("#writeComment").toggle();
    });
});

