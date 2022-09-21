<style>
.scroll {
    max-height: 605px;
    overflow-y: auto;
}

table{
    font-size: 0.8em;
}


</style>
<div class="card p-2 scroll" style=" overflow-x: hidden;">
    <form action="{{url('maps_google')}}" method="POST">
        @csrf
        <input type="text" name="arr_utc" class="d-none" id="arr_utc">
        <div>
            <button class="btn btn-sm btn-outline-secondary" type="button" onclick="calculo()"><i class="fa-solid fa-calculator"></i></button>
        </div>
    </form>
    <div class="text-center" id="list_utc" style="">
        <b class="text-muted" style="font-size: 1em">Empety</b>
        <i class="fa-regular fa-empty-set"></i>
    </div>
</div>
