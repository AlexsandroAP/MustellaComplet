<x-app-layout>
    <div class="py-12 text-white mt-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 md:mb-0 mx-10 md:mx-20 md:text-4xl text-3xl md:flex md:w-1/3">
                <h1>Poste Seus Conteúdos</h1>
            </div>
            
            <div class="md:flex bg-high-purplle shadow-sm mx-2 md:mx-0 p-10 items-start">
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="w-full">
                    @csrf
                    <div class="flex flex-col md:flex-row items-start md:space-x-4">
                        <!-- File Input -->
                        <div class="outline-none flex items-center justify-center w-full h-22rem md:w-1/3 rounded-extra-lg bg-purplle md:mt-5">
                            
                            <label for="image" class="flex flex-col items-center justify-center w-full h-10rem rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <p class="mt-4 text-center text-semibold text-sm text-gray uppercase">Clique ou arraste sua imagem</p>
                                </div>
                                <input type="file" id="image" name="image" required class="hidden">
                            </label>

                            <img id="output" class="flex items-center justify-center"/>

                        </div>


                        <script>
                            document.getElementById('image').addEventListener('change', function(event) {
                                var input = event.target;
                                var fileName = input.files[0] ? input.files[0].name : "";
                                document.getElementById('file-name').textContent = fileName;
                            });

                            document.getElementById('image').addEventListener('change', function(event) {
                                    var input = event.target;
                                    var reader = new FileReader();
                                    reader.onload = function(){
                                        var dataURL = reader.result;
                                        var output = document.getElementById('output');
                                        output.src = dataURL;
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                });
                            
                                document.getElementById('image').addEventListener('change', function(event) {
                                    var input = event.target;
                                    var reader = new FileReader();
                                    reader.onload = function(){
                                        var dataURL = reader.result;
                                        var output = document.getElementById('output');
                                        output.src = dataURL;
                                        // Esconde o texto quando a imagem é carregada
                                        document.querySelector('.text-center').style.display = 'none';
                                    };
                                    reader.readAsDataURL(input.files[0]);
                                });

                        </script>

                        

                        <!-- título e legenda -->
                        <div class="flex flex-col w-full md:w-2/3 space-y-4 mt-4 md:mt-0 md:mt-10">
                            <div>
                                <label for="title">Title:</label>
                                <textarea
                                name="title"
                                id="title"
                                class="bg-purplle border-none rounded-xl placeholder-basic-gray mt-2 h-20 w-full focus:ring-0 resize-none" placeholder="Título"></textarea>
                            </div>
                            <div>
                                <label for="caption">Legenda:</label>
                                <textarea
                                name="caption"
                                id="caption"
                                class="bg-purplle border-none rounded-xl placeholder-basic-gray mt-2 h-20 w-full focus:ring-0 resize-none" placeholder="Legenda"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="flex justify-end mt-4">
                        <x-primary-button type="submit" class="bg-orange border-none text-white px-4 py-2 rounded">Postar</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
