<!-- Success messages -->

@if (session('success'))
    <div class="row">
        <div class="column">
            <div class="ui success message">
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
@else
    <div class="row">
        <div class="column">
            <div class="ui error message">
                <p>{{ session('error') }}</p>
            </div>
        </div>
    </div>
@endif