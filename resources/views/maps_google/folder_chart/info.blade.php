<style>
    #list_utc {
        border: none;
    }
</style>


<div class=" scroll card" style=" overflow-x: hidden;">
    <form action="{{ url('maps_google') }}" method="POST">
        @csrf
        <input type="text" name="arr_utc" class="d-none" id="arr_utc">
        <div>
        </div>
    </form>
    <div class="text-center" id="list_utc" style="">

    </div>
</div>
