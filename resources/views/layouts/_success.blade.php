<!-- Success messages -->

@if(session('success'))
    <div class="row">
        <div class="column">
            <div class="ui success message">
                <p>{{ session('success') }}</p>
            </div>
        </div>
    </div>
@endif