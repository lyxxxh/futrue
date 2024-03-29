<!DOCTYPE html>
<html lang="en">
@include("Futrue.particles.userhead")
<body>

<!--头部-->
@include("Futrue.particles.top")

<!-- 右边的滑动框 -->
{{--@include("Futrue.particles.right_side")--}}
<!-- Main content starts -->

<div class="content">
    <!--侧边栏-->
    @include("Futrue.particles.sidebar")
    <div class="copyrights">Collect from <a href="http://www.cssmoban.com/" >Website Template</a></div>
    <!-- Mainbar starts -->
    <div class="mainbar">
        @section("content")
            <div class="matter">
                <div class="container-fluid">

                    <!-- /.content -->

                </div>
            </div>
        @show
    </div>
    <!--页脚-->
@include("Futrue.particles.foot")
<!-- JS -->
    <script src="{{asset('futrue/js/jquery.js')}}"></script>
    <script src="{{asset('futrue/js/bootstrap.js')}}"></script> <!-- Bootstrap -->
    <script src="{{asset('futrue/js/imageloaded.js')}}"></script> <!-- Imageloaded -->
    <script src="{{asset('futrue/js/jquery.isotope.js')}}"></script> <!-- Isotope -->
    <script src="{{asset('futrue/js/jquery.prettyPhoto.js')}}"></script> <!-- prettyPhoto -->
    <script src="{{asset('futrue/js/jquery.flexslider-min.js')}}"></script> <!-- Flexslider -->
    <script src="{{asset('futrue/js/custom.js')}}"></script> <!-- Main js file -->
</body>
</html>
