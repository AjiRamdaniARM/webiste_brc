<x-panel.app>
<style>
     :root {
        --vs-primary: 29 92 255;
        }

        /*Dialog Styles*/
        dialog {
        padding: 1rem 3rem;
        background: white;
        max-width: 400px;
        padding-top: 2rem;
        border-radius: 20px;
        border: 0;
        box-shadow: 0 5px 30px 0 rgba(0, 0, 0, 0.1);
        -webkit-animation: fadeIn 1s ease both;
                animation: fadeIn 1s ease both;
        }
        dialog::-webkit-backdrop {
        -webkit-animation: fadeIn 1s ease both;
                animation: fadeIn 1s ease both;
        background: rgba(255, 255, 255, 0.4);
        z-index: 2;
        -webkit-backdrop-filter: blur(20px);
                backdrop-filter: blur(20px);
        }
        dialog::backdrop {
        -webkit-animation: fadeIn 1s ease both;
                animation: fadeIn 1s ease both;
        background: rgba(255, 255, 255, 0.4);
        z-index: 2;
        -webkit-backdrop-filter: blur(20px);
                backdrop-filter: blur(20px);
        }
        dialog .x {
        filter: grayscale(1);
        border: none;
        background: none;
        position: absolute;
        top: 15px;
        right: 10px;
        transition: ease filter, transform 0.3s;
        cursor: pointer;
        transform-origin: center;
        }
        dialog .x:hover {
        filter: grayscale(0);
        transform: scale(1.1);
        }
        dialog h2 {
        font-weight: 600;
        font-size: 2rem;
        padding-bottom: 1rem;
        }
        dialog p {
        font-size: 1rem;
        line-height: 1.3rem;
        padding: 0.5rem 0;
        }
        dialog p a:visited {
        color: rgb(var(--vs-primary));
        }


        button.primary {
        display: inline-block;
        font-size: 0.8rem;
        color: #fff !important;
        background: rgb(var(--vs-primary)/100%);
        padding: 13px 25px;
        border-radius: 17px;
        transition: background-color 0.1s ease;
        box-sizing: border-box;
        transition: all 0.25s ease;
        border: 0;
        cursor: pointer;
        box-shadow: 0 10px 20px -10px rgb(var(--vs-primary)/50%);
        }
        button.primary:hover {
        box-shadow: 0 20px 20px -10px rgb(var(--vs-primary)/50%);
        transform: translateY(-5px);
        }

        @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
        }

        @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
        }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session()->has('participant'))
            document.getElementById('dialog').showModal();
        @endif
    });
    </script>

<dialog id="dialog">
    <div class="flex flex-col justify-center items-center">
        <img src="assets/ceklis.gif" alt="">
    <h1>Data Berhasil Di Edit</h1>
    </div>

    <button onclick="window.dialog.close();" aria-label="close" class="x">❌</button>
</dialog>
    <div id="team" class="section relative pt-20 pb-8 md:pt-16">
        <div class="container mx-auto px-1 lg:px-4">
            <!-- section header -->
            <header class="text-center mx-auto mb-12">
                <h2 class="text-2xl leading-normal mb-2 font-bold text-gray-800 dark:text-gray-100">
                    <span class="font-light">Participants</span> Perlombaan
                </h2>
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                    <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                    <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                </svg>
                <!--<form id="filterForm" class="mb-4 px-4">-->
                <!--    <select id="race" name="race" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">-->
                <!--        <option value="">All</option>-->
                <!--        @foreach ($race as $races )-->
                <!--        <option value="{{$races->id}}">{{$races->name}}</option>-->
                <!--        @endforeach-->
                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                <!--    </select>-->
                <!--</form>-->
            </header>

                 @if ($participants->isEmpty())
            <p>Tidak ada participants</p>
        @else
            <div id="participantsContainer" class="flex flex-wrap flex-row -mx-4 justify-center">
                @foreach ($participants as $data )
                <div class="flex-shrink max-w-full w-[100%] sm:w-1/2 md:w-5/12 lg:w-1/4 xl:px-6">
                    <div class="relative overflow-hidden bg-white dark:bg-gray-800 mb-12 hover-grayscale-0 wow fadeInUp rounded-2xl p-5" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <div class="relative overflow-hidden px-6">
                            <img src="{{asset('assets/animasi2.gif')}}" class="max-w-full h-auto mx-auto rounded-full bg-gray-50 " alt="title image">
                        </div>
                        <div class="pt-6 text-center">
                            <p class="text-lg text-black leading-normal font-bold mb-1">{{$data->name}}</p>
                            <p class=" leading-normal text-[13px] font-normal mb-1">Kelas : {{$data->kelas}}</p>
                                 <p class="text-gray-500 leading-relaxed font-normal">{{$data->IdCard}}</p>
                            <button  data-modal-target="authentication-modal{{$data->id}}" data-modal-toggle="authentication-modal{{$data->id}}" class="relative bg-blue-500 text-white mt-2 px-2 rounded-md hover:scale-105 hover:bg-blue-300">Edit Data</button>
                             @if($data->race && $data->race->category && $data->race->category->name == 'online')
                                    @if($data->projectonlines && $data->projectonlines && $data->projectonlines->status == 'sudah upload')
                                        <button type="button" class="bg-green-500 text-white hover:scale-105 hover:bg-green-700 focus:bg-green-700 transition-all rounded-sm"
                                        onclick="alert('Mohon Menunggu Tahap Selanjunya')"
                                        >Sudah Upload</button>
                                        @else
                                        <button type="button"
                                               class="bg-yellow-500 hover:bg-yellow-300 hover:scale-105 transition-all text-black rounded-sm"
                                                   data-modal-target="authentication-modal-rules{{ $data->id }}"
                                                   data-modal-toggle="authentication-modal-rules{{ $data->id }}">Upload
                                                  Projects</button>
                                
                                    @endif
                                @endif
                                @include('dashboard.participant.show.modalUpload')
                            <!--modal edit data participants-->
                            <div id="authentication-modal{{$data->id}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <!-- Modal content -->
                                    <div class="relative  rounded-lg shadow bg-gray-900">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                            <h3 class="text-xl font-bold text-white ">
                                               Edit Participants
                                            </h3>
                                            <button type="button" class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="authentication-modal{{$data->id}}">
                                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                                </svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="p-4 md:p-5">
                                            <form class="space-y-4" action="{{url('particpants/'.$data->id)}}" method="POST">
                                                @csrf
                                                <div>
                                                    <label for="email" class="block mb-2 text-sm font-medium text-white">Nama Peserta</label>
                                                    <input type="text" name="name" value="{{$data->name}}" class=" border  text-white bg-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required />
                                                </div>
                                                <div>
                                                    <label for="password" class="block mb-2 text-sm font-medium text-white">Kelas Peserta</label>
                                                     <input type="text" name="kelas" placeholder="" class=" border  text-white bg-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{$data->kelas}}" required />
                                                </div>

                                                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit Data</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--akhir modal edit data-->
                        </div>
                    </div>
                    <!-- end team block -->
                </div>
                @endforeach
            </div>
    @endif
            <!-- end row -->
        </div>
    </div>

    <script>
        function showModal(id) {
            document.getElementById('dialog' + id).showModal();
        }

        function closeModal(id) {
            document.getElementById('dialog' + id).close();
        }
    </script>

    <script>
      document.getElementById('race').addEventListener('change', function () {
    var selectedRace = this.value;
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '{{ route('participant.show.index') }}?race=' + selectedRace, true);
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');

    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Success!
            var response = xhr.responseText;
            document.getElementById('participantsContainer').innerHTML = response;
        } else {
            // We reached our target server, but it returned an error
        }
    };

    xhr.onerror = function () {
        // There was a connection error of some sort
    };

    xhr.send();
});
    </script>
</x-panel.app>