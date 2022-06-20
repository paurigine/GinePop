@extends('master')

@section('body')
<div class="row">
    <script src="/js/panel.js"></script>
    <div class="col-lg-2 offset-lg-1 col-md-3 offset-md-1 col-4 offset-1 my-5">
        <div class="col-lg-12 col-md-12 col-12">
            <section id="BtnCreateCategory" class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4">Crear Categoria</a>
            </section>
            <!-- <section id="BtnCreateUser" class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4">Crear Usuari</a>
            </section> -->
            <section id="BtnShowUsers" class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4">Gestionar Usuaris</a>
            </section>
            <section id="BtnShowItems" class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4">Gestionar Items</a>
            </section>
            <section id="BtnStats" class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4">Estadístiques</a>
            </section>
            <section id="BtnShowCategories" class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4">Gestionar Categories</a>
            </section>
            <section id="BtnShowCategories" class="white-box-shadow rounded mb-4 mv-left p-2">
                <a class="h4">Logs</a>
            </section>
        </div>
    </div>  
    <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-5 offset-1 my-5">
        <!-- CreateCategory -->
        <section id="CardCreateCategory" class="card-panel hiden content white-box-shadow rounded d-flex justify-content-center">
            <div class="col-6 pt-5">
                <div class="h2 mt-5 mb-4">Crear Categoria</div>
                <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label" for="name">Nom de la Categoria</label>
                    <input class="mb-4 customimput mt-1 block w-full" id="name" name="name" type="text">
                    <label class="form-label" for="image">Imatge (opcional)</label>
                    <input class="mb-4 form-control " type="file" name="image" id="image">
                    <input class="float-end btn btn-outline-secondary" type="submit" value="Crear">
                </form>
            </div>
        </section>
        <!-- ShowCategory -->
        <section id="CardShowCategory" class="container-fluid card-panel hiden white-box-shadow rounded d-flex justify-content-center">
            <div class="col-8 pt-5 mb-4 row">
                <div class="h2 mb-4 row">Gestionar Categories</div>
                <table class="table" id="categorycontent">
                    <tr><th scope="col">Id</th><th scope="col">Name</th><th scope="col">Img</th><th scope="col">Updated</th><th>Visibilitat</th><th></th></tr>
                </table>
            </div>
        </section>
        <!-- ShowUsers -->
        <section id="CardShowUsers" class="container-fluid card-panel hiden white-box-shadow rounded d-flex justify-content-center">
            <div class="col-10 pt-5 mb-4 row">
                <div class="h2 mb-4 row">Gestionar Usuaris</div>
                <table class="table" id="usercontent">
                    <th scope="col">Id</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Updated</th><th scope="col">Contact</th><th>Estat</th><th></th>
                </table>
            </div>
        </section>
        <!-- CardStats -->
        <section id="CardStats" class="card-panel hiden stats white-box-shadow rounded d-flex justify-content-center">
            <div class="col-12 pt-5">
                <div class="h1 mt-5 mb-4 offset-1">Estadístiques</div>
                <div id="CardStatsContent">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <div id="piechart" class="mb-5"></div>
                    <span class="ms-5 h7">Usuari / Items X Clicks</span>
                    <div id="barchart_material"></div>
                </div>
            </div>
        </section>
    </div>
    <!-- alert -->
    <div class="ms-auto">
        <div style="padding: 5px; display: none;" id="error">
            <div id="inner-message" class="alert alert-success fixed-top-right" role="alert">asd</div>
        </div>
    </div>
</div>

<!-- Modal ConfirmCategory -->
<div class="modal" id="ChangeCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ChangeCategoryLabel">Confirmació de Canvis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">Al desactivar una categoria també es desactivaran els seus ítems</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tanca</button>
        @csrf
        <button type="button" class="btn btn-outline-danger send-category-changes" data-bs-dismiss="modal">Cambiar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal UserInfo -->
<div class="modal" id="UserInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UserInfoLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="UserInfoContent"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tanca</button>
      </div>
    </div>
  </div>
</div>

@endsection