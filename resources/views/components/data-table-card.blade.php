<div class="card mb-4">
    <div class="alert-dark card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">{{ $attributes["card_title"]??"" }}</h5>
    </div>
    <div class="card-body table-responsive-lg table-responsive mt-2">
        <table class="table table-bordered data-table " style="width:100%">
            <thead>
                <tr>
                    {{$slot}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>