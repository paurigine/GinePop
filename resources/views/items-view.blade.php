@extends('master')

@section('body')
<div class="row justify-content-center align-items-center">
    <div class="col-lg-6 col-md-10 my-5">
        <div class="container mt-4">
            <div class="row row-cols-lg-1 row-cols-md-1 row-cols-1">
                <div class="col">
                    <div class="card mb-3 " style="border-radius:10px">
                        <div class="card-header d-flex">
                            <div class="card-user-detail">
                                <span id="seller" id_item="{{ $item->id }}" class="h3 card-title justify-content-start">{{ $item->usr }}@csrf</span>
                                @if ($item->sold == 1)
                                <span class="text-muted">{{ $item->sold }} Producte a la venda</span>
                                @else
                                <span class="text-muted">{{ $item->sold }} Productes a la venda</span>
                                @endif
                            </div>
                            @if(isset($user) && $user->id == $item->id_seller)
                            <button class="ms-auto btn btn-sm btn-outline-primary my-auto" data-bs-toggle="modal" data-bs-target="#manageModal">Gestionar</button>
                            <button class="ms-2 btn btn-sm my-auto" data-bs-toggle="modal" data-bs-target="#contactModal">Contacte</button>
                            @elseif (isset($user))
                            <button class="ms-auto btn btn-sm my-auto" data-bs-toggle="modal" data-bs-target="#contactModal">Contacte</button>
                            @endif
                        </div>
                        <div class="d-flex justify-content-center bg-white">
                            <!-- Slideshow container -->
                            <div class="slideshow-container">
                                <!-- Full-width images with number and caption text -->
                                @foreach ($imatges as $imatge)
                                @if ($imatge->id_item == $item->id)
                                <div class="mySlides fade">
                                    <img src="{{$imatge->url}}" class="carrusel">
                                </div>
                                @endif
                                @endforeach
                                <!-- Next and previous buttons -->
                                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                                <a class="next" onclick="plusSlides(1)">&#10095;</a>
                            </div>
                            <br>
                        </div>
                        <div class="card-body outline">
                            <h5 class="h1 card-title product-title" id="product-price">{{ $item->price }} €</h5>
                            <h1 class="h2 card-title product-title" id="product-title">{{ $item->name }}</h1>
                            <p class="card-textproduct-description" id="product-state">Estat: {{ $item->state }}</p>
                            <p class="card-textproduct-description" id="product-category">Categoria: {{ $item->id_category }}</p>
                            <p class="card-textproduct-description" id="product-location">Localització: {{ $item->location }}</p>
                            <p class="card-textproduct-description" id="product-description">Descripció: {{ $item->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Modal -->
    @if (isset($user))
    <div class="modal" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactModalLabel">Contacte</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div>Instagram: {{ $user->instagram }}</div><br>
                    <div>Whatsapp: {{ $user->whatsapp }}</div><br>
                    <div>Opcional: {{ $user->o_contact }}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 nav-link btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Manage Modal -->
    <div class="modal" id="manageModal" tabindex="-1" aria-labelledby="manageModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="manageModalLabel">Gestionar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <div id="edit" class="btn btn-outline-primary"><b>Editar</b></div>
                    <div id="delete" class="mx-2 btn btn-outline-danger"><b>Esborrar</b></div>
                    <div id="sold" class="btn btn-outline-success"><b>Venut!</b></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ml-4 nav-link btn btn-outline-success" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection