<form class="flex flex-col justify-center gap-2 px-6 sm:flex-row sm:justify-between sm:items-center ">
    <div>
        <x-select class="w-20" name="perPage" id="perPage" onchange="this.form.submit()">
            <option {{ Request::get('perPage') == 10 ? 'selected' : '' }} value="10">10</option>
            <option {{ Request::get('perPage') == 20 ? 'selected' : '' }} value="20">20</option>
            <option {{ Request::get('perPage') == 50 ? 'selected' : '' }} value="50">50</option>
            <option {{ Request::get('perPage') == 100 ? 'selected' : '' }} value="100">100</option>
        </x-select>
    </div>
    <div>
        <x-input id="search" type="search" name="search" placeholder="Search..."
            value="{{ Request::get('search') }}" />
    </div>
</form>
