<footer class="relative bg-gray-300 pt-8 pb-6">
    <div class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20" style="height: 80px;">
        <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex my-4">
                    <img class="mx-2" src="{{ url('images/large.png') }}" />
                    <img src="{{ url('images/logo.png') }}" />
                </div>

                <h4 class="text-3xl font-semibold">Let's keep in touch!</h4>
                <h5 class="text-lg mt-0 mb-2 text-gray-700">
                    Find us on facebook, we respond 1-2 business days.
                </h5>
                <div class="my-6">
                    <a href="https://www.facebook.com/manarehf" target="__blank">
                        <button class="bg-white text-blue-400 shadow-lg font-normal h-10 w-10 items-center justify-center align-center rounded-full outline-none focus:outline-none mr-2 p-3" type="button">
                            <i class="flex fab fa-facebook-square"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="flex flex-wrap items-top mb-6">
                    <div class="w-full lg:w-4/12 px-4 ml-auto lg:mt-0 mt-6">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Flýtileiðir</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="{{ route('index') }}">Heim</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="{{ route('deepCleaning') }}">Þjónusta</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="{{ route('machineRental') }}">Vélaleiga</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="{{ route('contact') }}">Um Castus</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 lg:mt-0 mt-6">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Opnunartími</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm">Mondays 9:00 - 16:00</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm">Þriðjudaga Lokað</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm">Miðvikudaga 9:00 - 16:00</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm">Fimmtudaga Lokað</a>
                            </li>
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm">Föstudaga 9:00 - 12:00</a>
                            </li>
                        </ul>
                    </div>
                    <div class="w-full lg:w-4/12 px-4 lg:mt-0 mt-6">
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Starfsstöð</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm">Gylfaflöt 17 112 Reykjavík</a>
                            </li>
                        </ul>
                        <span class="block uppercase text-gray-600 text-sm font-semibold mb-2">Aðstoð</span>
                        <ul class="list-unstyled">
                            <li>
                                <a class="text-gray-700 hover:text-gray-900 font-semibold block pb-2 text-sm" href="mailto:manar@manar.is">manar@manar.is</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-400" />
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4 mx-auto text-center">
                <div class="text-sm text-gray-600 font-semibold py-1">
                    Copyright © Mánar ehf
                </div>
            </div>
        </div>
    </div>
</footer>