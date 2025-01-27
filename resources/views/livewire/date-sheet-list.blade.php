<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">

                    <div class="card-header h3  bg-white">
                         Date Sheet List
                    </div>
                    <div class="card-body">
                        @session('success')
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                        @endsession
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Student</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($cards as $card)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$card->title}}</td>
                                    <td>{{$card->user->name}}</td>
                                    <td>{{$card->class->class_name}}</td>
                                    <td>
                                        <button type="button" onclick="openDialoge({{$card->id}})" class="btn btn-danger" >
                                            Delete
                                          </button>
                                        <a href="{{route('admin.sheet.edit',[$card->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('admin.sheet.print',[$card->id])}}" class="btn btn-dark">Print</a>

                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>No Result Card Found</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade"  id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="deleteModalLabel">Confirmation</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Do you want to delete?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" wire:click='deleteConfirm' data-dismiss="modal">Delete</button>
            </div>
          </div>
        </div>
      </div>
      @push('js')
      <script>
        function openDialoge(id) {
            @this.deleteThis(id);
            setTimeout(() => {
                $('#deleteModal').modal('show');
            }, 1000);

        }
      </script>
      @endpush
</div>
