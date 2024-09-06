@extends("layout.admin", ['pagina'=>'pacientes'])
@section('contenido')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                            <!-- DataTales Example -->
                             <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sucursales</h6>
                                </div>
                                <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal">
                                    <i class="fas fa-fw fa-user"></i> 
                                    <span>agregar nueva sucursal</span>
                                </a>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Nombre Sucursal</th>
                                                    <th>ubicacion</th>
                                                    <th>Telefono</th>
                                                    <th>Estado</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($sucursales as $sucursal)
                                                <tr>
                                                    <td>{{ $sucursal->id }}</td>
                                                    <td>{{ $sucursal->nombreSucursal }}</td>
                                                    <td>{{ $sucursal->ubicacion }}</td>
                                                    <td>{{ $sucursal->telefono }}</td>
                                                    <td>{{ $sucursal->estado }}</td>
                                                    <td> 
                                                        <a href="#editEmployeeModal-{{ $sucursal->id }}" class="edit" data-id="{{ $sucursal->id }}" data-toggle="modal">
                                                            <i class="fas fa-fw fa-pen"></i>
                                                        </a>
                                                        <a href="#deleteEmployeeModal" data-id="{{ $sucursal->id }}" data-name="{{ $sucursal->nombreSucursal }}" class="delete" data-toggle="modal">
                                                            <i class="fas fa-fw fa-trash"></i>
                                                        </a>
                                                    </td>
                                           
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </div><!-- End of Main Content --><!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy;ADD -2024-</span>
                    </div>
                </div>
            </footer><!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
        </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- addempleado -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form  method="POST" action="{{ route('sucursales-crear') }}">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Ingresar una sucursal</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Nombre de la sucursal</label>
						<input id="nombreSucursal" name="nombreSucursal" type="text" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>ubicacion</label>
						<input id="ubicacion" name="ubicacion" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Telefono</label>
						<input id="telefono" name="telefono" type="number" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Agregar">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
@foreach($sucursales as $sucursal)
<div id="editEmployeeModal-{{ $sucursal->id }}" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form form method="POST" action="{{ route('sucursales-actualizar') }}">
				<div class="modal-header">						
					<h4 class="modal-title">Editar usuario</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
                <div class="modal-body">
                    <div class="form-group">
                    <label>ID</label>
                    <input type="text" id="id-{{ $sucursal->id }}" name="id" class="form-control" value="{{ $sucursal->id }}" readonly>
                    </div>					
					<div class="form-group">
						<label>Nombre de la sucursal</label>
						<input id="nombreSucursal-{{ $sucursal->id }}" name="nombreSucursal"  value="{{ $sucursal->nombreSucursal }}"type="text" class="form-control" required>
					</div>
                    <div class="form-group">
						<label>Estado</label>
                        <select class="form-control" name="estado" required>
                            <option value="Activo" @if($sucursal->estado == 'activo') selected @endif>ACTIVO</option>
                            <option value="Inactivo" @if($sucursal->estado == 'inactivo') selected @endif>INACTIVO</option>
                        </select>
					</div>			
                    <div class="form-group">
						<label>ubicacion</label>
						<input id="ubicacion-{{ $sucursal->id }}" name="ubicacion" value="{{ $sucursal->ubicacion }}" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Telefono</label>
						<input id="telefono-{{ $sucursal->id }}" name="telefono" value="{{ $sucursal->telefono }}" type="number" class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-success" value="Actualizar">
				</div>
			</form>
		</div>
	</div>
</div>
@endforeach

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Elimimar usuario</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>¿Estas seguro de eliminar este empleado?</p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-danger" value="Eliminar">
				</div>
			</form>
		</div>
	</div>
</div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que deseas cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Haz clic en "Salir" para confirmar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="btn btn-primary" type="button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</button>
                </div>
            </div>
        </div>
    </div>
    
<!-- Bootstrap core JavaScript-->
<script src="{{asset('backend/assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="{{asset('backend/assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('backend/assets/js/demo/datatables-demo.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

@endsection