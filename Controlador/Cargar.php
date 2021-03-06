<?php
class Cargar extends Controlador
{
    /******************Rol*************/
    public function Rol()
    {
        $consultas = $this->modelo('Rol');

        $filas = $consultas->buscarRol();
        echo '
        <div class="table-responsive">
            <table class="table">
                <thead class="thead-bg1">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Permisos</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <th scope="row">' . $fila['id_rol'] . '</th>
                        <td>' . $fila['rol'] . '</td>
                        <td>';

                $permisos = json_decode($fila['permits']);
                foreach ($permisos as $permiso) {
                    echo '<span class="badge btn-primary-gt letter-large m-2">' . $permiso . '</span>';
                };


                echo '</td>    
                        <td>                
                        <button class="btn btn-secondary-gt" onclick="deleteRegister(' . $fila['id_rol'] . ')"><i class="fas fa-trash"></i></button>
                        <button data-toggle="modal" data-target="#modalUpdate" class="btn btn-secondary-gt" onclick="cargarDatos(' . $fila['id_rol'] . ')"><i class="fas fa-edit"></i></button>
                        </td> 
                    </tr>
                ';
            }
        }
        echo '<tbody></table>';
    }

    public function buscarRol()
    {
        $consultas = $this->modelo('Rol');
        $filas = $consultas->buscarRol();
        return $filas;
    }

    /*botonoes Categoria*/
    public function botonesCategorias()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '<a type="button" class="btn btn-lg btn-secondary-gt btn-category ';
        echo $_GET['cat'] == 0 ? 'active' : '';
        echo ' my-3 mx-2" href="http://localhost/guatelibro/ver/bibliotecadigital?page=1&cat=0">Todos</a>';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <a class="btn btn-lg btn-secondary-gt btn-category my-3 mx-2 ';
                echo $_GET['cat'] ==  $fila['id_category'] ? 'active' : '';
                echo '" href="http://localhost/guatelibro/ver/bibliotecadigital?page=1&cat=' . $fila['id_category'] . '">' . $fila['category'] . '</a>
                ';
            }
        }
    }

    /*botonoes Categoria*/
    public function botonesCategoriaPersonal()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '<a type="button" class="btn btn-lg btn-secondary-gt btn-category ';
        echo $_GET['catP'] == "todos" ? 'active' : '';
        echo ' my-3 mx-2" href="http://localhost/guatelibro/ver/mibiblioteca?catP=todos&catS=' . $_GET['catS'] . '">Todos</a>';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <a class="btn btn-lg btn-secondary-gt btn-category my-3 mx-2 ';
                echo $_GET['catP'] ==  $fila['id_category'] ? 'active' : '';
                echo '" href="http://localhost/guatelibro/ver/mibiblioteca?catP=' . $fila['id_category'] . '&catS=' . $_GET['catS'] . '">' . $fila['category'] . '</a>
                ';
            }
        }
    }

    /*botonoes Categoria*/
    public function botonesCategoriaLibrosPersonales()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '<a type="button" class="btn btn-lg btn-secondary-gt btn-category ';
        echo $_GET['catS'] == "todos" ? 'active' : '';
        echo ' my-3 mx-2" href="http://localhost/guatelibro/ver/mibiblioteca?catP=' . $_GET['catP'] . '&catS=todos">Todos</a>';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <a class="btn btn-lg btn-secondary-gt btn-category my-3 mx-2 ';
                echo $_GET['catS'] ==  $fila['id_category'] ? 'active' : '';
                echo '" href="http://localhost/guatelibro/ver/mibiblioteca?catP=' . $_GET['catP'] . '&catS=' . $fila['id_category'] . '">' . $fila['category'] . '</a>
                ';
            }
        }
    }

    /*Etiquetas Categoria*/
    public function labelsCategorias()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '<div class="title-category ';
        echo $_GET['cat'] == 0 ? 'active' : '';
        echo '">Todos los articulos</div>';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<div class="title-category ';
                echo $_GET['cat'] ==  $fila['id_category'] ? 'active' : '';
                echo '">' . $fila['category'] . '</div>';
            }
        }
    }

    /*Etiquetas Categoria*/
    public function labelsCategoriaPersonal()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '<div class="title-category ';
        echo $_GET['catP'] == "todos" ? 'active' : '';
        echo '">Todos los articulos</div>';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<div class="title-category ';
                echo $_GET['catP'] ==  $fila['id_category'] ? 'active' : '';
                echo '">' . $fila['category'] . '</div>';
            }
        }
    }

    /*Etiquetas Categoria*/
    public function labelsCategoriaLibrosPersonal()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '<div class="title-category ';
        echo $_GET['catS'] == "todos" ? 'active' : '';
        echo '">Todos los articulos</div>';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<div class="title-category ';
                echo $_GET['catS'] ==  $fila['id_category'] ? 'active' : '';
                echo '">' . $fila['category'] . '</div>';
            }
        }
    }

    /*Categoria*/
    public function categoria()
    {
        $consultas = $this->modelo('Categoria');

        $filas = $consultas->buscarCategoria();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Categoria</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_category'] . '</td>
                        <td>' . $fila['category'] . '</td>                    
                        <td><button onclick="mostrar_msg(' . $fila['id_category'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_category'] . '" onclick="cargar(' . $fila['id_category'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarCategoria"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarCategoria()
    {
        $consultas = $this->modelo('Categoria');
        $filas = $consultas->buscarCategoria();
        return $filas;
    }

    public function selectCategoria()
    {
        $consultas = $this->modelo('Categoria');
        $filas = $consultas->buscarCategoria();
        echo '<select class="form-control" name="select_category" id="select_category">';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_category'] . '">' . $fila['category'] . '</option>';
            }
        }
        echo '</select>';
    }

    public function selectCategoria2()
    {
        $consultas = $this->modelo('Categoria');
        $filas = $consultas->buscarCategoria();
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_category'] . '">' . $fila['category'] . '</option>';
            }
        }
    }

    /*Membership*/
    public function membership()
    {
        $consultas = $this->modelo('Membership');

        $filas = $consultas->buscarMembership();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tipo Membresia</th>
                        <th>Precio</th>
                        <th>No. Meses</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_membership'] . '</td>
                        <td>' . $fila['type_membership'] . '</td>     
                        <td>' . $fila['price'] . '</td>    
                        <td>' . $fila['date_months'] . '</td>                 
                        <td><button onclick="mostrar_msg(' . $fila['id_membership'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_membership'] . '" onclick="cargar(' . $fila['id_membership'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarMembership"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarMembership()
    {
        $consultas = $this->modelo('Membership');
        $filas = $consultas->buscarMembership();
        return $filas;
    }

    /*Membership*/
    public function comprar_membership()
    {
        $consultas = $this->modelo('Membership');

        $filas = $consultas->buscarMembership();
        echo '';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '      
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <div class="bg-white p-5 rounded-lg shadow">';
                if ($fila['type_membership'] == "Mensual") {
                    echo '      

                        <h1 class="h6 text-uppercase font-weight-bold mb-4">' . $fila['type_membership'] . '</h1>
                        <h2 class="h1 font-weight-bold">Q79.99<span class="text-small font-weight-normal ml-2">/ mes</span></h2>

                        <div class="custom-separator my-4 mx-auto btn-primary-gt"></div>

                        <ul class="list-unstyled my-5 text-small text-left">
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Acesso a todos los libros
                            </li>
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Compartir libros
                            </li>
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Soporte Completo
                            </li>
                        </ul>
                       ';
                }
                if ($fila['type_membership'] == "Anual") {
                    echo '      
                        <h1 class="h6 text-uppercase font-weight-bold mb-4">' . $fila['type_membership'] . '</h1>
                        <h2 class="h1 font-weight-bold">Q849.99<span class="text-small font-weight-normal ml-2">/ anual</span></h2>

                        <div class="custom-separator my-4 mx-auto btn-primary-gt"></div>

                             <ul class="list-unstyled my-5 text-small text-left">
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Acesso a todos los libros
                            </li>
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Compartir libros
                            </li>
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Pagas solo 10 meses
                            </li>
                        </ul>';
                }
                if ($fila['type_membership'] == "Semestral") {
                    echo '      
                        <h1 class="h6 text-uppercase font-weight-bold mb-4">' . $fila['type_membership'] . '</h1>
                        <h2 class="h1 font-weight-bold">Q399.99<span class="text-small font-weight-normal ml-2">/ semestral</span></h2>

                        <div class="custom-separator my-4 mx-auto btn-primary-gt"></div>

                <ul class="list-unstyled my-5 text-small text-left">
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Acesso a todos los libros
                            </li>
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Compartir libros
                            </li>
                            <li class="mb-3">
                            <i class="fa fa-check mr-2 text-primary"></i> Pagas solo 5 meses
                            </li>
                        </ul>
                       ';
                }

                echo '<button href="" class="btn btn-primary-gt btn-block p-2 shadow rounded-pill" onclick="comprar(' . $fila['id_membership'] . ',' . $_SESSION['id_member'] . ',' . $fila['price'] . ',' . $fila['date_months'] . ')">Suscribete</button>
                        </div>
                    </div>';
            }
        }
    }

    public function selectRol()
    {
        $consultas = $this->modelo('Rol');
        $filas = $consultas->buscarRol();
        echo '<select class="form-control" name="id_rol" id="id_rol">';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_rol'] . '">' . $fila['rol'] . '</option>';
            }
        }
        echo '</select>';
    }

    public function selectRolRegister()
    {
        $consultas = $this->modelo('Rol');
        $filas = $consultas->buscarRolSinAdmin();
        echo '<select class="form-control" name="id_rol" id="id_rol">';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_rol'] . '">' . $fila['rol'] . '</option>';
            }
        }
        echo '</select>';
    }


    /*Usuarios*/
    public function memberbers()
    {
        $consultas = $this->modelo('Members');

        $filas = $consultas->buscarMembers();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Tel??fono</th>
                        <th>Direcci??n</th>
                        <th>Foto</th>
                        <th>Instituci??n</th>
                        <th>Usuario</th>
                        <th>Contrase??a</th>
                        <th>Estado</th>
                        <th>Rol</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_member'] . '</td>
                        <td>' . $fila['name_member'] . '</td>     
                        <td>' . $fila['surname_member'] . '</td>    
                        <td>' . $fila['email'] . '</td>
                        <td>' . $fila['phone'] . '</td>    
                        <td>' . $fila['direction'] . '</td>
                        <td><img src="../assets/img/members/' . $fila['photo'] . '" class="img-fluid" width=60 height=4 alt="' . $fila['photo'] . '" id="photo' . $fila['id_member'] . '"></td>                 
                        <td>' . $fila['institution'] . '</td>
                        <td>' . $fila['user_member'] . '</td>
                        <td>' . $fila['password'] . '</td>
                        <td>' . $fila['state'] . '</td>
                        <td>' . $fila['id_rol'] . '</td>
                        <td><button onclick="mostrar_msg(' . $fila['id_member'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_member'] . '" onclick="cargar(' . $fila['id_member'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarMembers"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarMembers()
    {
        $consultas = $this->modelo('Members');
        $filas = $consultas->buscarMembers();
        return $filas;
    }

    public function selectMember()
    {
        $consultas = $this->modelo('Members');
        $filas = $consultas->buscarMembers();
        echo '<select class="form-control" name="selectMember" id="selectMember">';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_member'] . '">' . $fila['name_member'] . '</option>';
            }
        }
        echo '</select>';
    }

    public function selectMember2()
    {
        $consultas = $this->modelo('Members');
        $filas = $consultas->buscarMembers();
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_member'] . '">' . $fila['name_member'] . '</option>';
            }
        }
    }

    /*Productos*/
    public function products()
    {
        $consultas = $this->modelo('Product');

        $filas = $consultas->buscarProducto();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Descripci??n</th>
                        <th>Documento</th>
                        <th>Portada</th>
                        <th>Fecha de registro</th>
                        <th>Categoria</th>
                        <th>Miembro</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas['rows'] as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_product'] . '</td>
                        <td>' . $fila['name_product'] . '</td>     
                        <td>' . $fila['description_product'] . '</td>    
                        <td>' . $fila['path_product'] . '</td>    
                        <td><img src="../assets/img/portadas/' . $fila['image_product'] . '" class="img-fluid" width=60 height=4 alt="' . $fila['image_product'] . '" id="image_product' . $fila['id_product'] . '"></td>   
                        <td>' . $fila['date_register'] . '</td>   
                        <td>' . $fila['id_category'] . '</td>   
                        <td>' . $fila['id_member'] . '</td>   
                        <td><button onclick="deleteRegister(' . $fila['id_product'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_product'] . '" onclick="cargar(' . $fila['id_product'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#modalUpdate"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    /*Productos*/
    public function productsPDF($id_product)
    {
        $libroYaAgregado = $this->modelo('Library_user');
        $existe = $libroYaAgregado->buscarProductoIDUser($id_product, $_SESSION['id_member']);

        $consultas = $this->modelo('Product');
        $esMiLibro = $consultas->buscarProductoMemberSubidos2($_SESSION['id_member'], $id_product);

        $filas = $consultas->buscarProductoID($id_product);

        if ($filas != []) {

            foreach ($filas as $fila) {
                echo '
                    <div class="col-md-12">
                    <iframe src="http://localhost/guatelibro/assets/documents/' . $fila['path_product'] . '" width="100%" height="600px"></iframe>
                    </div>
                    <div class="col-md-12 details-book-pdf mt-3">
                    <div>
                        <div class="img-book">
                        <img src="http://localhost/guatelibro/assets/img/portadas/' . $fila['image_product'] . '" class="img-rounded" alt="">
                        </div>
                        <p>' . $fila['name_product'] . '</p>
                    </div>
                    <div>';
                if ($esMiLibro !== null) {
                    echo '<button class="btn btn-lg btn-terceary-gt m2" disabled="disabled" >Este es tu libro</button>';
                } else if ($existe !== false) {
                    echo '<a class="btn btn-lg btn-danger m-2" onclick="delete_library(' . $existe[0]['id_user'] . ')">Eliminar de mi biblioteca</a>
                        <button class="btn btn-lg btn-terceary-gt m2" disabled="disabled" >Ya est?? en tu biblioteca</button>';
                } else {
                    echo '<button class="btn btn-lg btn-secondary-gt m2" id="add_book_library" onclick="add_book(' . $id_product . ',' . $_SESSION['id_member'] . ')">Agregar a mi biblioteca</button>';
                }
                echo ' </div>
                    </div>';
            }
        }
    }

    public function buscarProducto()
    {
        $consultas = $this->modelo('Product');
        $filas = $consultas->buscarProducto();
        return $filas;
    }

    public function buscarProductoMember()
    {
        $consultas = $this->modelo('Product');
        $filas = $consultas->buscarProductoMember();
        return $filas;
    }

    /*Productos*/
    public function productMember($id_member, $category_id)
    {
        $consultas = $this->modelo('Product');

        // $page = $consultas->buscarProducto($category_id);
        $filas = $consultas->buscarProductoMember($id_member, $category_id);
        if ($filas !== NULL) {
            echo '
            <div class="row grid-cards">
                <div class="col-md-12">
                    <main class="page-content">
            ';
            foreach ($filas['rows'] as $fila) {
                echo '
                <div class="card card-book" style="background-image: url(http://localhost/guatelibro/assets/img/portadas/' . $fila['image_product'] . ')">
                <div class="content">
                    <h2 class="title">' . $fila['name_product'] . '</h2>
                    <button class="btn-card-book" data-toggle="modal" data-target=".modal-product-details" onclick="cargarDatosBiblioteca(' . $fila['id_book_library'] . ',' . $_SESSION['id_member'] . ')">Ver mas</button>
                </div>
                </div>
                ';
            }
            echo '
                    </main>
                </div>
            </div>
            ';
        }
    }

    public function productMemberSubidos($id_member, $category_id)
    {
        $consultas = $this->modelo('Product');

        // $page = $consultas->buscarProducto($category_id);
        $filas = $consultas->buscarProductoMemberSubidos($id_member, $category_id);
        if ($filas) {
            echo '
            <div class="row grid-cards">
                <div class="col-md-12">
                    <main class="page-content">
            ';
            foreach ($filas['rows'] as $fila) {
                echo '
                <div class="card card-book" style="background-image: url(http://localhost/guatelibro/assets/img/portadas/' . $fila['image_product'] . ')">
                <div class="content">
                    <h2 class="title">' . $fila['name_product'] . '</h2>
                    <button class="btn-card-book" data-toggle="modal" data-target="#modalUpdate" onclick="cargarDatosLibrosMios(' . $fila['id_product'] . ',' . $_SESSION['id_member'] . ')">Ver mas</button>
                </div>
                </div>
                ';
            }
            echo '
                    </main>
                </div>
            </div>
            ';
        }
    }

    public function buscarProductoPagination()
    {
        $consultas = $this->modelo('Product');
        $filas = $consultas->buscarProductoPagination();
        return $filas;
    }

    /*Productos*/
    public function productPagination($pagina, $category_id, $id_member)
    {
        $consultas = $this->modelo('Product');

        // $page = $consultas->buscarProducto($category_id);
        $filas = $consultas->buscarProductoPagination($pagina, $category_id, $id_member);
        if ($filas) {
            echo '
            <div class="row grid-cards">
                <div class="col-md-12">
                    <main class="page-content">
            ';
            foreach ($filas['rows'] as $fila) {
                echo '
                <div class="card card-book" style="background-image: url(http://localhost/guatelibro/assets/img/portadas/' . $fila['image_product'] . ')">
                <div class="content">
                    <h2 class="title">' . $fila['name_product'] . '</h2>
                    <button class="btn-card-book" data-toggle="modal" data-target=".modal-product-details" onclick="cargarDatos(' . $fila['id_product'] . ',' . $_SESSION['id_member'] . ')">Ver mas</button>
                </div>
                </div>
                ';
            }
            echo '
                    </main>
                </div>
            </div>
            ';

            // echo '
            //     <nav aria-label="Page navigation example">
            //         <ul class="pagination">
            //         <li class="page-item ';
            // echo $_GET['page'] <= 1 ? "disabled" : "";
            // echo '"><a class="page-link btn btn-terceary-gt mx-1" href="http://localhost/guatelibro/ver/bibliotecadigital?page=' . $_GET['page'] - 1  . '&cat=' . $_GET['cat'] . '">Anterior</a></li>
            // ';

            // for ($i = 0; $i < $page['total_db_page']; $i++) {
            //     echo '
            //         <li class="page-item ';
            //     echo $_GET['page'] == $i + 1 ? "active" : "";
            //     echo '"><a class="page-link  mx-1" href="http://localhost/guatelibro/ver/bibliotecadigital?page=' . $i + 1 . '&cat=' . $_GET['cat'] . '">' . $i + 1 . '</a></li>';
            // }
            // echo '
            //     <li class="page-item ';
            // echo $_GET['page'] >= $page['total_db_page'] ? "disabled" : "";
            // echo '"><a class="page-link btn btn-terceary-gt mx-1" href="http://localhost/guatelibro/ver/bibliotecadigital?page=' . $_GET['page'] + 1  . '&cat=' . $_GET['cat'] . '">Siguiente</a></li>
            //         </ul>
            //     </nav>
            // ';
        }
    }



    /*Pagos*/
    public function payments()
    {
        $consultas = $this->modelo('Payments');

        $filas = $consultas->buscarPayments();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Miembro</th>
                        <th>Membresia</th>
                        <th>Tipo Pago</th>
                        <th>Pago</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_payments'] . '</td>
                        <td>' . $fila['id_member'] . '</td>     
                        <td>' . $fila['id_membership'] . '</td>    
                        <td>' . $fila['payment_type'] . '</td>   
                        <td>' . $fila['payment'] . '</td>                
                        <td><button onclick="mostrar_msg(' . $fila['id_payments'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_payments'] . '" onclick="cargar(' . $fila['id_payments'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarPayments"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarPayments()
    {
        $consultas = $this->modelo('Payments');
        $filas = $consultas->buscarPayments();
        return $filas;
    }

    public function selectPayment()
    {
        $consultas = $this->modelo('Payments');
        $filas = $consultas->buscarPayments();
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_payments'] . '">' . 'M' . $fila['id_member'] . '. ' . $fila['payment_type'] . '-' . $fila['payment'] . '</option>';
            }
        }
    }

    public function selectMembership()
    {
        $consultas = $this->modelo('Membership');
        $filas = $consultas->buscarMembership();
        echo '<select class="form-control" name="id_membership" id="id_membership">';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_membership'] . '">' . $fila['type_membership'] . '</option>';
            }
        }
        echo '</select>';
    }

    public function selectProduct()
    {
        $consultas = $this->modelo('Product');
        $filas = $consultas->buscarProducto();
        echo '<select class="form-control" name="id_product" id="id_product">';
        if ($filas) {
            foreach ($filas['rows'] as $fila) {
                echo '<option value="' . $fila['id_product'] . '">' . $fila['name_product'] . '</option>';
            }
        }
        echo '</select>';
    }

    public function selectProduct2()
    {
        $consultas = $this->modelo('Product');
        $filas = $consultas->buscarProducto();
        if ($filas) {
            foreach ($filas['rows'] as $fila) {
                echo '<option value="' . $fila['id_product'] . '">' . $fila['name_product'] . '</option>';
            }
        }
    }


    public function selectMembers()
    {
        $consultas = $this->modelo('Members');
        $filas = $consultas->buscarMembers();
        echo '<select class="form-control" name="id_member" id="id_member">';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '<option value="' . $fila['id_member'] . '">' . $fila['name_member'] . '</option>';
            }
        }
        echo '</select>';
    }



    /*Pagos*/
    public function library_user()
    {
        $consultas = $this->modelo('Library_user');

        $filas = $consultas->buscarLibrery_user();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Miembro</th>
                        <th>Producto</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_user'] . '</td>
                        <td>' . $fila['id_member'] . '</td>     
                        <td>' . $fila['id_product'] . '</td>                    
                        <td><button onclick="mostrar_msg(' . $fila['id_user'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_user'] . '" onclick="cargar(' . $fila['id_user'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#actualizarLibrary_user"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    /*Pagos*/
    public function suscription()
    {
        $consultas = $this->modelo('Suscription');

        $filas = $consultas->buscarSuscription();
        echo '
        <div class="table-responsive">
            <table class="table mt-4 table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pago</th>
                        <th>Inicio de Suscripci??n</th>
                        <th>Fin de Suscripci??n</th>
                        <th>Fecha de cancelado</th>
                        <th>Estado</th>
                        <th>Creado</th>
                        <th>Eliminar</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
            ';
        if ($filas) {
            foreach ($filas as $fila) {
                echo '
                    <tr>
                        <td>' . $fila['id_suscription'] . '</td>
                        <td>' . $fila['id_payments'] . '</td>     
                        <td>' . $fila['subscription_start'] . '</td>    
                        <td>' . $fila['subscription_end'] . '</td>   
                        <td>' . $fila['date_cancel'] . '</td>                
                        <td>' . $fila['state'] . '</td>                
                        <td>' . $fila['created_at'] . '</td>                
                        <td><button onclick="mostrar_msg(' . $fila['id_suscription'] . ');" class="btn btn-secondary-gt"><i class="fas fa-trash"></i></button></td>
                        <td><button id="cargar' . $fila['id_suscription'] . '" onclick="cargar(' . $fila['id_suscription'] . ')"; class="btn btn-secondary-gt" data-toggle="modal" data-target="#modalUpdate"><i class="fas fa-user-edit"></i></button></td>
                    </tr>
                ';
            }
        }
        echo '<tbody></table></div>';
    }

    public function buscarSuscription()
    {
        $consultas = $this->modelo('Suscription');
        $filas = $consultas->buscarSuscription();
        return $filas;
    }
}
