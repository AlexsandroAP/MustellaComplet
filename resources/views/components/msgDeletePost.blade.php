@if (session()->has('MensagemDeletePost'))
    <div class="flex fixed w-full md:right-0 bottom-0 rounded-lg mb-4 md:mr-10 md:mb-10 bg-orange text-white p-5 block mb-7rem md:mb-10rem md:w-1/3" role="alert" id="meuAlerta">
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3 closebtn" onclick="this.parentElement.style.display='none';">
        <svg class="h-6 w-6 text-white" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
            <title>Close</title>
                <path fill="currentColor" d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"></path>
        </svg>

        </span>

        <img class="mr-2 h-6" src="{{ asset('imagens/lixeira.png') }}" alt="Post">

        {{ session()->get('MensagemDeletePost') }}
    </div>
@endif