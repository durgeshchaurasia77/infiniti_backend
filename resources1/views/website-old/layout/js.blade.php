<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('website/assets/lib/wow/wow.min.js')}}"></script>
<!--   -->
<script src="{{asset('website/assets/lib/counterup/counterup.min.js')}}"></script>
<!--   -->
<script src="{{asset('website/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>


<!-- Template Javascript -->
<script src="{{asset('website/assets/js/main.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    const videoModal = document.getElementById('videoModal');
    const videoIframe = document.getElementById('videoIframe');
    videoModal.addEventListener('hidden.bs.modal', function() {
        videoIframe.src = videoIframe.src;
    });
</script>

<script>
    $(document).ready(function() {
        $(".service-carousel").owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            autoplay: true,
            autoplayHoverPause: false,
            smartSpeed: 500,
            dots: true,
            loop: true,
            nav: true,
            navText: [
                '<i class="bi bi-arrow-left"></i>',
                '<i class="bi bi-arrow-right"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).on('submit', 'form.formSubmit1', function(e) {

        e.preventDefault();
        var data = new FormData(this);
        $('.loderIcon').show();
        $('.loderButton').prop("disabled", true);
        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            dataType: "json",
            data: data,
            beforeSend: function() {
                $('.preloader').show();
            },
            complete: function() {
                $('.preloader').hide();
            },
            success: function(response) {
                $('.loderIcon').hide();
                $('.loderButton').prop("disabled", false);
                if (response.responseCode == 200) {
                    toastr.success(response.responseMessage);
                    if (response.responseUrl) {
                        location.href = response.responseUrl;
                    } else {
                        location.reload();
                    }

                } else {
                    toastr.error(response.responseMessage);
                    if(response.responseUrl)
                        {
                            location.href = response.responseUrl;
                        }
                }
            }
        });
    });

</script>
<script type="text/javascript">
    $(document).on('submit', 'form.formSubmit2', function(e) {

        e.preventDefault();
        var data = new FormData(this);
        $('.loderIcon').show();
        $('.loderButton').prop("disabled", true);
        $.ajax({
            cache: false,
            contentType: false,
            processData: false,
            url: $(this).attr("action"),
            method: $(this).attr("method"),
            dataType: "json",
            data: data,
            beforeSend: function() {
                $('.preloader').show();
            },
            complete: function() {
                $('.preloader').hide();
            },
            success: function(response) {
                $('.loderIcon').hide();
                $('.loderButton').prop("disabled", false);
                if (response.responseCode == 200) {
                    toastr.success(response.responseMessage);
                    if (response.responseUrl) {
                        location.href = response.responseUrl;
                    } else {
                        location.reload();
                    }

                } else {
                    toastr.error(response.responseMessage);
                    if(response.responseUrl)
                        {
                            location.href = response.responseUrl;
                        }
                }
            }
        });
    });

</script>
