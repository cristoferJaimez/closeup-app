<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-sm-12 " style="position: relative;">

            <div class=" row" id="default">
                <div class="text-center text-muted position-absolute top-50 start-50 translate-middle"
                    style="background-image: url('')" >
                    <i class="text-muted fa-solid fa-chart-pie  fa-9x cometa " ></i>
                    <br>
                    <i class=""></i>
                    <b>Close Up Analytics</b>
                </div>

            </div>
        </div>



        <div class="col-md-2 col-sm-12">
            <div class="list-group list-group-flush mb-3" style="overflow-x: hidden; overflow-y: hidden">
                <a href="{{ url('listUsers') }}" target="_parent" id="home.listUsers"
                    class="list-group-item list-group-item-action href_" aria-current="true">
                    <i class="fa-solid fa-user-plus"></i> Load new users
                </a>
                <a href="{{ url('listPost') }}" class="list-group-item list-group-item-action href_">
                    <i class="fa-solid fa-list-ul"></i> Load post
                </a>
                <a href="{{ route('utcmaps') }}" target="_blank" id="home.listUsers"
                    class="list-group-item list-group-item-action" aria-current="true">
                    <i class="fa-solid fa-map"></i> Maps
                </a>
                <a href="{{ route('listUTC') }}" target="_blank"
                    class="list-group-item list-group-item-action  nav-link {{ request()->routeIs('listUTC') ? 'active text-white' : 'text-dark' }}">
                    <i class="fa-solid fa-list-ul"></i> List UTC
                </a>
                <a href="#" class="list-group-item list-group-item-action href_">
                    <i class="fa-regular fa-paper-plane"></i> Send Emails
                </a>
            </div>

            <h6 class="text-muted">
                <i class="fa-regular fa-folder"></i> Repository
            </h6>
            <div class="list-group list-group-flush" style="overflow-x: hidden; overflow-y: hidden">
                <a href="#" class="list-group-item list-group-item-action href_" aria-current="true">
                    <i class="fa-regular fa-file-excel"></i> Files Excel
                </a>
                <a href="#" class="list-group-item list-group-item-action href_">
                    <i class="fa-solid fa-file-csv"></i> File CSV
                </a>
                <a href="#" class="list-group-item list-group-item-action href_">
                    <i class="fa-solid fa-file-pdf"></i> File PDF
                </a>
                <a href="#" class="list-group-item list-group-item-action href_">
                    <i class="fa-solid fa-image"></i> File IMG
                </a>

            </div>
        </div>
    </div>
</div>
<!--<a class="suppoprt-me" href="https://www.buymeacoffee.com/marioduarte" target="_blank"><img src="https://www.close-upinternational.com/img/logo.svg" width="100px" height="100px"></a>
-->
