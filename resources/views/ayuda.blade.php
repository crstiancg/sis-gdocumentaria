<x-front-layout>
    <div class="py-12 bg-white rounded p-6 shadow-lg">
        <h1 class="text-center text-2xl font-semibold text-gray-900 dark:text-white">ENVÍO DE DOCUMENTOS</h1>
        <hr>
        <div class="text-justify">
            <p>Estimados usuarios, para mayor facilidad, se ha puesto a su disposición este formulario, que le permitirá el envío de documentos a la Gerencia de Desarrollo Urbano de la Municipalidad Provincial de Puno.</p>
            <p>Mediante esta plataforma no se tomará en cuenta los siguientes trámites:
                <ul class="my-4 w-full text-gray-900 list-disc list-inside dark:text-white">
                    <li>
                        Documentos comprendidos en el Texto Único de Procedimientos Administrativos (TUPA) de la Municipalidad Provincial de Puno.
                    </li>
                </ul>
            </p>
            <p>Nota: El horario de recepción de documentos de la mesa de ayuda virtual será de lunes a viernes de 08:00hrs a las 16:00hrs.</p>
        </div>
        <div>
        </div>
        <form action="{{ route('ayuda.store') }}" method="post" enctype="multipart/form-data" class="data">
            @method('POST')
            {{-- <x-validation-errors class="mb-4">

            </x-validation-errors> --}}
            @csrf
                <div class="mb-4 mt-4">
                    <x-input-label :required="true">
                        Tipo de Persona
                    </x-input-label>
                    <select id="persona" name="tipo_persona_id"
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                        onchange="mostrar()">
                            <option selected value>Seleccionar...</option>
                            <option value="1">Persona Natural</option>
                            <option value="2">Persona Jurídica</option>
                        {{-- <x-input-error :messages="$errors->get('tipo_persona_id')"></x-input-error> --}}
                    </select>
                </div>
                <div class="bg-white rounded p-6 shadow-lg mb-4">
                    <div class="text-center font-semibold text-gray-800 rounded text-xl">
                        <h2  class="text-center">DATOS DEL ADMINISTRADO</h2>
                    </div>
                    <hr>
                    <div class="lg:columns-2 mt-4">
                        <div class="mb-4">
                            <x-input-label :required="true">Documento de Identidad</x-input-label>
                            <x-text-input type="text" class="w-full" name="dni" />
                            <x-input-error :messages="$errors->get('dni')"></x-input-error>
                        </div>

                        <div class="mb-4">
                            <x-input-label :required="true">Apellido Paterno</x-input-label>
                            <x-text-input type="text" class="w-full" name="paterno" />
                            <x-input-error :messages="$errors->get('paterno')"></x-input-error>
                        </div>
                    </div>

                    <div class="lg:columns-2">
                        <div class="mb-4">
                            <x-input-label :required="true">Apellido Materno</x-input-label>
                            <x-text-input type="text" class="w-full" name="materno" />
                            <x-input-error :messages="$errors->get('materno')"></x-input-error>
                        </div>

                        <div class="mb-4">
                            <x-input-label :required="true">Nombres</x-input-label>
                            <x-text-input type="text" class="w-full" name="nombre" />
                            <x-input-error :messages="$errors->get('nombre')"></x-input-error>
                        </div>
                    </div>

                    <div class="lg:columns-2">

                        <div class="mb-4">
                            <x-input-label :required="true">Número de Celular</x-input-label>
                            <x-text-input type="text" class="w-full" name="celular" />
                            <x-input-error :messages="$errors->get('celular')"></x-input-error>
                        </div>


                        <div class="mb-4">
                            <x-input-label :required="true">Correo Electrónico</x-input-label>
                            <x-text-input type="text" class="w-full" name="correo"/>
                            <x-input-error :messages="$errors->get('correo')"></x-input-error>
                        </div>
                    </div>
                    <div class="mb-4" id="otros" hidden>
                        <x-input-label :required="true">Razon Social</x-input-label>
                        <x-text-input type="text" class="w-full" name="razonsocial"/>
                    </div>
                </div>

                <div class="bg-white rounded p-6 shadow-lg mb-6">
                    <div class="text-center font-semibold text-gray-800 rounded text-xl">
                        <h2 class="text-center">DATOS DEL DOCUMENTO</h2>
                    </div>
                    <hr>
                    <div class="mb-4 mt-4">
                        <x-input-label :required="true">Tipo de Documento</x-input-label>

                        <select name="tipo_documento" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option disabled selected>Seleccionar...</option>
                        @foreach ($tipo as $item)
                            <option value="{{ $item->id }}" >{{ $item->nombre }}</option>
                        @endforeach
                        {{-- <x-input-error :messages="$errors->get('tipo_documento')"></x-input-error> --}}
                        </select>
                    </div>
                    <div class="mb-4 mt-4">
                        <x-input-label :required="true">Oficina</x-input-label>
                        <select name="oficina_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option disabled selected>Seleccionar...</option>
                        @foreach ($oficina as $item)
                            <option value="{{ $item->id }}" >{{ $item->nombre }}</option>
                        @endforeach
                        </select>
                    </div>

                    {{-- <div class="mb-4 mt-4">
                        <x-input-label :required="true">Procedimiento</x-input-label>
                        <select name="procedimiento_id" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                        <option disabled selected>Seleccionar...</option>
                        @foreach ($procedimiento as $item)
                            <option value="{{ $item->id }}" >{{ $item->nombre }}</option>
                        @endforeach
                        </select>
                    </div> --}}
                    <div class="lg:columns-2">
                        <div class="mb-4">
                            <x-input-label :required="true">Número de Documento</x-input-label>
                            <x-text-input type="text" class="w-full" name="numero"/>

                            <x-input-error :messages="$errors->get('numero')"></x-input-error>
                            {{-- @error('numero')
                            <small class="text-red-700">{{ $messages }}</small>
                            @enderror --}}
                        </div>

                        <div class="mb-4">
                            <x-input-label :required="true">Número de Folio</x-input-label>
                            <x-text-input type="text" class="w-full" name="folio" />
                            <x-input-error :messages="$errors->get('folio')"></x-input-error>
                        </div>
                    </div>


                    <div class="mb-4">
                        <x-input-label :required="true">Asunto</x-input-label>
                        <textarea type="text" rows="5"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" 
                            name="asunto"></textarea>
                            <x-input-error :messages="$errors->get('asunto')"></x-input-error>
                    </div>

                    <div class="">
                        <x-input-label :required="true">Subir Documento</x-input-label>
                        <label class="flex items-center px-4 py-2 bg-gray-500 rounded-lg text-gray-800">
                            {{-- <i class="fa-solid fa-camera mr-3"></i> --}}
                            Seleccionar documento
                            <input name="archivo" type="file" class="hidden">
                        </label>
                        <x-input-error :messages="$errors->get('archivo')"></x-input-error>
                    </div>

                </div>
                <div class="flex justify-center ">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Enviar Documento</button>
                    {{-- <x-primary-button class="enviarform">
                        Enviar Documento
                    </x-primary-button> --}}
                </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(session('enviarform_')=='ok')
    <script>
        Swal.fire(
            'Se envió correctamente',
            'Operación exitosa',
            'success'
        )
    </script>
    @endif
    <script>
        $('.data').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Esta seguro que quiere enviar?',
                text: '',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Si, quiero enviar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            })
        });
    </script>

    <script>
        const mostrar = () => {
            if(document.getElementById('persona').value == 2){
                document.getElementById('otros').hidden = false;
                // console.console('otros');
            }else{
            document.getElementById('otros').hidden = true;
            document.getElementById('otros').value = ""
            }

            // console.log(document.getElementById('persona').value)
        }

    </script>
</x-front-layout>