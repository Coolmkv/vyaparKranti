<div class="card mb-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $attributes["card_title"]??"" }}</h5>
    </div>
    <div class="alert-info card-body table-responsive">
        <table class="table table-bordered data-table" style="width:100%">
            {{$slot}}
        </table>
    </div>
</div>