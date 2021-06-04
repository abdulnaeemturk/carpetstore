<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Color') }}
        </h2>
    </x-slot>
    <hr>
    <div class="row">
        <div class="col" style="background-color:#ffffff;margin-left: 15px !important;">
            
                <select class="form-control" name="records_perpage" id="records_perpage" onchange="fetchLatestRecordsPagination()">
                    <option value="10"> 10 </option>
                    <option value="20"> 20 </option>
                    <option value="50"> 50 </option>
                    <option value="100"> 100 </option>
                    <option value="200"> 200 </option>
                    <option value="500"> 500 </option>
                    <option value="1000"> 1000 </option>
                </select>
            <div id="records_table">
            </div>
        </div>
    <div class="col-md-4" style="background-color:#ffffff">
    <form method="POST" action="#" id="add_form">
        @include('Color.partials.form')
        <div class="form-group row mb-0">
            <div class="col-md-6 ">
                <br>
                <button type="button" onclick="addRecord(this)" class="btn btn-primary">
                    {{ __('Add Record') }}
                </button>
            </div>
        </div>
    </form>

    <form method="POST" action="#" id="update_form" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
            @include('Color.partials.form')
        <div class="form-group row mb-0">
            <div class="col-md-6">
                <br>
                <button type="button" id="update_record" id="update_record" class="btn btn-primary">
                    {{ __('Update Record') }}
                </button>
                <button onclick="cancelUpdateForm('add_form', 'update_form')"  type="button" id="cancel_update" class="btn btn-warning">
                    {{ __('cancel') }}
                </button>
            </div>
        </div>
    </form>
        
     
     </div>
    </div>
   
</x-app-layout>
<script>
var _global_page_numbr = 1;
function addRecord(event)
{   
    $(event).prop('disabled', true);
    $(event).addClass("fa fa-spinner fa-spin");
    var action_completed = submitFormDynamically('add_form', 'color', 'Successfully Inserted', 'Please Try Again', 'POST');
    if(action_completed == "success")
    {
        $(event).prop('disabled', false);
        $(event).removeClass('fa fa-spinner fa-spin');
        fetchLatestRecordsPagination();
    }
}

function editCurrentRecord(_record_id)
{
    getFormRecordDynamically("update_form", 'color', _record_id, "get", "update_record", "add_form", "update_form");
}

function updateRecord(_record_id)
{
    var action_completed = submitFormDynamically('update_form', 'color/'+_record_id, 'Successfully Updated', 'Please Try Again', 'POST');
    if(action_completed == "success")
    {
        cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination('records_table',_global_page_numbr);
    }
}

function deleteCurrentRecord(_record_id)
{
    var action_completed = submitFormDynamically('delete_form'+_record_id, 'color/'+_record_id, 'Successfully Deleted', 'Please Try Again', 'POST');
    if(action_completed == "success")
    {
        // cancelUpdateForm('add_form', 'update_form');
        fetchLatestRecordsPagination('records_table',_global_page_numbr);
    }
}

function fetchLatestRecordsPagination(_color_appendable = 'records_table', _page_number = 0, _appened = 0, _per_page = 10)
{
    _global_page_numbr = _page_number;
    if(_per_page == 10)
    {
        _per_page = $('#records_perpage option:selected').val();
    }
    fetchRecordsDynamically(_color_appendable, 'colorlistusingpagination', _per_page, _page_number, _appened);
}

$(document).ready(function(){
    fetchLatestRecordsPagination();
});


</script>