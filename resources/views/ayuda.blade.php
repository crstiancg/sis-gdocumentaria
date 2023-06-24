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
        <form class="" action="#" method="post">
            @csrf
            <div class="">
                <div class="mb-4 mt-4">
                    <x-input-label>
                        Tipo de Persona
                    </x-input-label>
                    <select name=""
                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full">
                            <option selected>Seleccionar...</option>
                            <option value="" >Persona Jurídica</option>
                            <option value="" >Persona Natural</option>
                    </select>
                </div>
                <div class="bg-white rounded p-6 shadow-lg mb-4">
                    <div class="bg-gray-800 text-center font-semibold text-white rounded text-xl">
                        <h2  class="text-center">DATOS DEL ADMINISTRADO</h2>
                    </div>
                    <div class="lg:columns-2 mt-4">
                        <div class="mb-4">
                            <x-input-label>Documento de Identidad *</x-input-label>
                            <x-text-input type="text" class="w-full" name="name" id="name" value="" />
                        </div>

                        <div class="mb-4">
                            <x-input-label>Apellido Paterno *</x-input-label>
                            <x-text-input type="text" class="w-full" name="slug" id="slug" value="" />
                        </div>
                    </div>

                    <div class="lg:columns-2">
                        <div class="mb-4">
                            <x-input-label>Apellido Materno *</x-input-label>
                            <x-text-input type="text" class="w-full" name="name" id="name" value="" />
                        </div>

                        <div class="mb-4">
                            <x-input-label>Nombres *</x-input-label>
                            <x-text-input type="text" class="w-full" name="slug" id="slug" value="" />
                        </div>
                    </div>

                    <div class="lg:columns-2">

                        <div class="mb-4">
                            <x-input-label>Número de Celular *</x-input-label>
                            <x-text-input type="text" class="w-full" name="slug" id="slug" value="" />
                        </div>


                        <div class="mb-4">
                            <x-input-label>Correo Electrónico *</x-input-label>
                            <x-text-input type="text" class="w-full" name="name" id="name" value="" />
                        </div>
                    </div>
                    <div class="mb-4">
                        <x-input-label>Domicilio Actual *</x-input-label>
                        <x-text-input type="text" class="w-full" name="name" id="name" value="" />
                    </div>
                </div>

                <div class="bg-white rounded p-6 shadow-lg mb-6">
                    <div class="bg-gray-800 text-center font-semibold text-white rounded text-xl">
                        <h2  class="text-center">DATOS DEL DOCUMENTO</h2>
                    </div>
                        <div class="mb-4 mt-4">
                            <x-input-label>Tipo de Documento *</x-input-label>
                            <x-text-input type="text" class="w-full" name="name" id="name" value="" />
                        </div>


                    <div class="lg:columns-2">
                        <div class="mb-4">
                            <x-input-label>Número de Documento *</x-input-label>
                            <x-text-input type="text" class="w-full" name="name" id="name" value="" />
                        </div>

                        <div class="mb-4">
                            <x-input-label>Número de Folio *</x-input-label>
                            <x-text-input type="text" class="w-full" name="slug" id="slug" value="" />
                        </div>
                    </div>


                    <div class="mb-4">
                        <x-input-label>Asunto *</x-input-label>
                        <textarea type="text" rows="5"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full" 
                            name="slug" id="slug" value="" >
                        </textarea>
                    </div>

                    <div class="">
                        <label class="flex items-center px-4 py-2 bg-gray-800 rounded-lg text-white">
                            {{-- <i class="fa-solid fa-camera mr-3"></i> --}}
                            Seleccionar Documento
                            <input name="pdf" type="file" class="hidden" accept="doc/*" >
                        </label>
                    </div>

                </div>
                <div class="flex justify-center">
                    <x-primary-button>
                        Enviar Documento
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>
</x-front-layout>