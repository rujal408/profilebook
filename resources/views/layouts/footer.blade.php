@if(! auth()->user())
<section class="footer">
<div class="footer">
    <hr>
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-3">
                    <div style="border-right: solid 1px; color: #1f648b;">
                    <h4 class="footer-title">ProfileBook</h4>

                        Copyright &copy; {{date('Y')}}
                    </div>

                </div>
        <div class="col-md-2">

    <ul style="list-style: none;">
        <li><b>Support</b></li><hr>
        <li><a href="#"> About us</a></li>
        <li><a href="#">Contacts</a></li>
    </ul>
    </div>
                <div class="col-md-2">
                    <ul style="list-style: none;">
                        <li><b>Market</b></li><hr>
                        <li><a href="#"> Advertise</a></li>
                        <li><a href="#">Creators</a></li>
                    </ul>
                </div>

                <div class="col-md-2">
                    <ul style="list-style: none;">
                        <li><b>Others</b></li><hr>
                        <li><a href="#"> Peoples</a></li>
                        <li><a href="#">Games</a></li>
                    </ul>
                </div>
                <div class="col-md-3">

                </div>


    </div>
    </div>
</div>
</section>
    @endif