<div>

    @include('livewire.admin.brand.modal-form')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Brands List
                        <a href="#" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#addBrandModal">Add Brand</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->status == 1 ? 'hidden' : 'visible' }}</td>
                                    <td><a href="#" wire:click='editBrand({{ $item->id }})'
                                            data-bs-toggle="modal" data-bs-target="#updateBrandModal"
                                            class="btn btn-sm btn-primary">Edit</a>
                                        <a href="#" wire:click='deleteBrand({{ $item->id }})'
                                            data-bs-toggle="modal" data-bs-target="#deleteBrandModal"
                                            class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5">No brands forund.</td>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $brands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        // Listen for the 'close-modal' event and close the modal
        window.addEventListener('close-modal', event => {
            $('#updateBrandModal').modal('hide');
            $('#deleteBrandModal').modal('hide');
            $('#addBrandModal').modal('hide');
        });
    </script>
@endpush
