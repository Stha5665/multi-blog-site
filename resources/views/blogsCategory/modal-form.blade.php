    <div wire:ignore.self class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Category</h1>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label >
                            Category Name
                        </label>

                        <!-- Defers syncing the input with the Livewire property until an "action" is performed. This saves drastically on server roundtrips -->
                        <input type="text"  name="category_name" class="form-control">
                        @error('category_name') <small class="text-danger">{{$message}}</small>@enderror
                    </div>
                    <div class="mb-3">
                        <label>
                            Short Description
                        </label>
                        <textarea name="short_description" cols="30" rows="10" class="form-control"></textarea>
                        @error('short_description') <small class="text-danger">{{$message}}</small>@enderror

                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveBtn">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>

