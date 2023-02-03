<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Service Type and its modules') }}
        </h2>
    </x-slot>

    <div id="products-create">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-1 m-16">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('serviceTypes.store') }}" method="POST">
                        @csrf

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input type="text" name="title" id="title" autocomplete="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                                        <textarea type="text" name="short_description" id="short_description" autocomplete="short_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description</label>
                                        <textarea type="text" name="long_description" id="long_description" autocomplete="long_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                    </div>
                                </div>

                                <div id="display-service-classes"></div>

                            </div>
                            <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                <button type="submit" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
                            </div>
                        </div>
                    </form>

                    <button class="bg-sky-500 text-white active:bg-sky-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150 my-12" type="button" onclick="toggleModal('modal-id')">
                        Add Service Class
                    </button>
                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="modal-id">
                        <div class="relative my-6 mx-auto w-800">
                            <!--content-->
                            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                <!--header-->
                                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                    <h3 class="text-3xl font-semibold">
                                        Create Serive Class
                                    </h3>
                                    <button class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none" onclick="toggleModal('modal-id')">
                                        <span class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                            ×
                                        </span>
                                    </button>
                                </div>

                                <!--body-->
                                <div class="relative p-6 flex-auto">
                                    <form class="my-4 text-slate-500 text-lg leading-relaxed w-3xl">
                                        <div class="col-span-6">
                                            <label for="service_class_title" class="block text-sm font-medium text-gray-700">Title</label>
                                            <textarea type="text" name="service_class_title[]" id="service_class_title" autocomplete="service_class_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                        </div>
                                        <div class="col-span-6 mt-3 mb-12">
                                            <label for="service_class_description" class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea type="text" name="service_class_description[]" id="service_class_description" autocomplete="service_class_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                        </div>

                                        <div id="display-service"></div>

                                        <a class="bg-sky-500 text-white active:bg-sky-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="addService()">Add Service</a>
                                    </form>
                                </div>
                                <!--footer-->
                                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                        Close
                                    </button>
                                    <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="addServiceClass()">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }

        function saveServiceClass(modalID) {

        }

        function addService() {

            let products = <?php echo $products ?>;
            let id = (Math.random() + 1).toString(36).substring(7);

            let html = `
                <div class="my-6">
                    <div class="col-span-6 sm:col-span-4">
                        <label for="service-title" class="block text-sm font-medium text-gray-700">Title</label>
                        <input type="text" name="service-title[]" autocomplete="service-title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label for="service-price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="text" name="service-price[]" autocomplete="service-price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                    </div>
                    <div class="col-span-6 sm:col-span-4">
                        <label for="service-description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea type="text" name="service-description[]" autocomplete="service-description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></textarea>
                    </div>
                    <label for="service-products" class="block text-sm font-medium text-gray-700">Select products</label>
                    <select multiple name="service-products[]" data-id="${id}" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <option selected>Choose products</option>
                        ${products.map((product) => {
                            return `<option value="${product.id}">${product.title}</option>`
                        })}
                    </select>
                </div>
            `
            $('#display-service').append(html);
        }

        function addServiceClass() {

            var serviceArrayTitle = []
            serviceArrayTitle.push($("input[name='service-title[]']")
                .map(function() {
                    return $(this).val();
                }).get());

            var serviceArrayPrice = []
            serviceArrayPrice.push($("input[name='service-price[]']")
                .map(function() {
                    return $(this).val();
                }).get());

            var serviceArrayDescription = []
            serviceArrayDescription.push($("textarea[name='service-description[]']")
                .map(function() {
                    return $(this).val();
                }).get());

            var serviceArrayProducts = []
            serviceArrayProducts.push($("select[name='service-products[]']")
                .map(function() {
                    let id = $(this).attr('data-id');
                    let val = $(this).val();
                    return {
                        id,
                        val,
                    };
                }).get());

            // console.log('serviceArrayProducts');
            console.log(serviceArrayProducts);

            let html = createServiceClassDiv($('#service_class_title').val(), $('#service_class_description').val(), serviceArrayTitle, serviceArrayPrice, serviceArrayDescription, serviceArrayProducts)
            $('#display-service-classes').append(html);

            toggleModal('modal-id');
        }

        function createServiceClassDiv(title, description, serviceArrayTitle, serviceArrayPrice, serviceArrayDescription, serviceArrayProducts) {
            let id = (Math.random() + 1).toString(36).substring(7);

            return `
                <div id="${id}" class="col-span-12 mt-16">
                    <h4 class="text-2xl mb-2">Service Classes</h4>
                    <div class="grid grid-cols-12">
                        <div class="col-span-10">
                            <h4 class="text-xl">${title}</h4>
                            <p>${description}</p>
                            <input hidden name="service_class_title[${id}]" class="text-xl" value="${title}">
                            <input hidden name="service_class_description[${id}]" class="text-xl" value="${description}">
                            ${serviceArrayTitle.map((items, key) => {
                                return items.map((item) => {
                                    return `<input hidden name="service_array_title[${id}][]" class="text-xl" value="${item}">`;
                                })
                            })}
                            ${serviceArrayPrice.map((items, key) => {
                                return items.map((item) => {
                                    return `<input hidden name="service_array_price[${id}][]" class="text-xl" value="${item}">`;
                                })
                            })}
                            ${serviceArrayDescription.map((items, key) => {
                                return items.map((item) => {
                                    return `<input hidden name="service_array_description[${id}][]" class="text-xl" value="${item}">`;
                                })
                            })}
                            ${serviceArrayProducts.map((items, key) => {
                                return items.map((item, key) => {
                                    return item.val.map((value) => {
                                        return `<input hidden name="service_products[${id}][${key}][]" class="text-xl" value="${value}">`;
                                    })
                                })
                            })}
                        </div>
                        <div class="col-span-2">
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="removeServiceClass('${id}')">Delete</button>
                        </div>
                    </div>
                </div>
            `;
        }

        function removeServiceClass(id) {
            $('#' + id).remove();
        }
    </script>

</x-app-layout>