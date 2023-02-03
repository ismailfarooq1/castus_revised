<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Service Type') }}
        </h2>
    </x-slot>

    <div id="products-create">
        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-1 m-16">
                <div class="mt-5 md:mt-0">
                    <form action="{{ route('serviceTypes.update', [$serviceType]) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="overflow-hidden shadow sm:rounded-md">
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-6 gap-6">
                                    <div class="col-span-6 sm:col-span-4">
                                        <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                        <input value="{{ $serviceType->title }}" type="text" name="title" id="title" autocomplete="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="short_description" class="block text-sm font-medium text-gray-700">Short Description</label>
                                        <textarea type="text" name="short_description" id="short_description" autocomplete="short_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $serviceType->short_description }}</textarea>
                                    </div>

                                    <div class="col-span-6">
                                        <label for="long_description" class="block text-sm font-medium text-gray-700">Long Description</label>
                                        <textarea type="text" name="long_description" id="long_description" autocomplete="long_description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ $serviceType->long_description }}</textarea>
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
                                            <input type="text" name="service_class_title[]" id="service_class_title" autocomplete="service_class_title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
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
                                    <!-- <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('modal-id')">
                                        Close
                                    </button> -->
                                    <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="addServiceClass()">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>



                    <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center" id="edit-id">
                        <div class="relative my-6 mx-auto w-800">
                            <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                <div class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                    <h3 class="text-3xl font-semibold">
                                        Edit Serive Class
                                    </h3>
                                </div>

                                <div class="relative p-6 flex-auto">
                                    <form class="my-4 text-slate-500 text-lg leading-relaxed w-3xl">
                                        <input hidden type="text" value="" id="id" />
                                        <div class="col-span-6">
                                            <label for="service_class_title_edit" class="block text-sm font-medium text-gray-700">Title</label>
                                            <input type="text" name="service_class_title_edit[]" id="service_class_title_edit" autocomplete="service_class_title_edit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
                                        </div>
                                        <div class="col-span-6 mt-3 mb-12">
                                            <label for="service_class_description_edit" class="block text-sm font-medium text-gray-700">Description</label>
                                            <textarea type="text" name="service_class_description_edit[]" id="service_class_description_edit" autocomplete="service_class_description_edit" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                                        </div>

                                        <div id="display-service-edit"></div>

                                        <a class="bg-sky-500 text-white active:bg-sky-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="addServiceEdit()">Add Service</a>
                                    </form>
                                </div>

                                <div class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                    <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="toggleModal('edit-id')">
                                        Close
                                    </button>
                                    <button class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="updateServiceClass()">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="edit-id-backdrop"></div>


                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            generateRelation();
        })

        function generateRelation() {
            let serviceClasses = <?php echo $serviceType->serviceClasses; ?>;

            serviceClasses.map((serviceClass) => {
                let serviceArrayTitle = [];
                let serviceArrayPrice = [];
                let serviceArrayDescription = [];
                let serviceArrayProducts = [];

                serviceClass.services.map((service) => {
                    serviceArrayTitle.push(service.title);
                    serviceArrayPrice.push(service.price);
                    serviceArrayDescription.push(service.description);
                    serviceArrayProducts.push(service.service_products);
                })

                // console.log('serviceArrayProducts')
                // console.log(serviceArrayProducts)

                let html = createServiceClassDiv(serviceClass.title, serviceClass.description, [serviceArrayTitle], [serviceArrayPrice], [serviceArrayDescription], [serviceArrayProducts]);

                $('#display-service-classes').append(html);
            })
        }

        function toggleModal(modalID) {
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");
        }

        function saveServiceClass(modalID) {

        }

        function addService() {

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
                    
                </div>
            `
            $('#display-service').append(html);
        }

        function addServiceEdit() {

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
                    
                </div>
            `
            $('#display-service-edit').append(html);
        }

        function editService() {

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

            let html = createServiceClassDiv($('#service_class_title').val(), $('#service_class_description').val(), serviceArrayTitle, serviceArrayPrice, serviceArrayDescription)
            $('#display-service-classes').append(html);

            toggleModal('modal-id');
        }

        function updateServiceClass() {

            id = $('#edit-id #id').val();
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

            removeServiceClassDiv(id);

            let html = createServiceClassDiv($('#service_class_title_edit').val(), $('#service_class_description_edit').val(), serviceArrayTitle, serviceArrayPrice, serviceArrayDescription)
            $('#display-service-classes').append(html);

            toggleModal('edit-id');
        }

        function removeServiceClassDiv(id) {
            $('#' + id).remove();
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
                                    
                                    return items.map((item, key2) => {
                                        let serviceClassId = (Math.random() + 1).toString(36).substring(7);
                                        return `
                                        <div id="${serviceClassId}">
                                            <input hidden name="service_array_title[${id}][]" class="text-xl" value="${item}">
                                            <input hidden name="service_array_price[${id}][]" class="text-xl" value="${serviceArrayPrice[key][key2]}">
                                            <input hidden name="service_array_description[${id}][]" class="text-xl" value="${serviceArrayDescription[key][key2]}">
                                            ${serviceArrayProducts[key].map((item2) => {
                                                    // let serviceId = (Math.random() + 1).toString(36).substring(7);
                                                    // console.log(item)
                                                    return item2.map((obj) => {
                                                        return `<input hidden name="service_array_products[${id}][${serviceClassId}][]" class="text-xl" value="${obj.product.id}">`;
                                                    });
                                                })
                                            }
                                        </div>
                                        `;
                                    })
                                })}
                                
                            </div>
                        </div>
                        <div class="col-span-2">
                            <button class="text-blue-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="editServiceClass('${id}')">Edit</button>
                            <button class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150" type="button" onclick="removeServiceClass('${id}')">Delete</button>
                        </div>
                    </div>
                </div>
            `;
        }

        function editServiceClass(id) {
            modalID = 'edit-id';
            document.getElementById(modalID).classList.toggle("hidden");
            document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
            document.getElementById(modalID).classList.toggle("flex");
            document.getElementById(modalID + "-backdrop").classList.toggle("flex");

            $("#edit-id #id").val(id);

            var service_class_title = $('#' + id + " [name='service_class_title[" + id + "]']").val();
            var service_class_description = $('#' + id + " [name='service_class_description[" + id + "]']").val();
            $("#edit-id [name='service_class_title_edit[]']").val(service_class_title);
            $("#edit-id [name='service_class_description_edit[]']").val(service_class_description);

            var serviceArrayTitle = []
            serviceArrayTitle.push($('#' + id + " [name='service_array_title[" + id + "][]']")
                .map(function() {
                    return $(this).val();
                }).get());

            var serviceArrayPrice = []
            serviceArrayPrice.push($('#' + id + " [name='service_array_price[" + id + "][]']")
                .map(function() {
                    return $(this).val();
                }).get());

            var serviceArrayDescription = []
            serviceArrayDescription.push($('#' + id + " [name='service_array_description[" + id + "][]']")
                .map(function() {
                    return $(this).val();
                }).get());

            // var allServiceIds;
            // allServiceIds = $('#' + id + " [name='allServiceIds[]']")
            //     .map(function() {
            //         return $(this).val();
            //     }).get();

            var serviceArrayProducts = []
            // allServiceIds.map((serviceId) => {
            serviceArrayProducts.push($('#' + id + " [name='service_array_products[" + id + "][" + serviceId + "][]']")
                .map(function() {
                    // console.log('hee')
                    // console.log($(this).attr('data-serviceid'))
                    // console.log(serviceId)
                    if ($(this).attr('data-serviceid') == serviceId) {
                        return [$(this).val(), serviceId];
                    }

                }).get());
            // })


            console.log('id')
            console.log(id)

            console.log('serviceArrayDescription')
            console.log(serviceArrayDescription)
            console.log('serviceArrayProducts')
            console.log(serviceArrayProducts)

            generateService(serviceArrayTitle, serviceArrayPrice, serviceArrayDescription);
        }

        function generateService(serviceArrayTitle, serviceArrayPrice, serviceArrayDescription) {

            let html = ``;

            serviceArrayTitle.map((items, key) => {
                items.map((item, itemKey) => {
                    console.log('item')
                    console.log(item)
                    let id = (Math.random() + 1).toString(36).substring(7);
                    html += `
                        <div id="${id}" class="my-6">
                            <div class="col-span-6 sm:col-span-4">
                                <label for="service-title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input value="${item}" type="text" name="service-title[]" autocomplete="service-title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <label for="service-price" class="block text-sm font-medium text-gray-700">Price</label>
                                <input value="${serviceArrayPrice[key][itemKey]}" type="text" name="service-price[]" autocomplete="service-price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                            </div>
                            <div class="col-span-6 sm:col-span-4">
                                <label for="service-description" class="block text-sm font-medium text-gray-700">Description</label>
                                <textarea value="${serviceArrayDescription[key][itemKey]}"type="text" name="service-description[]" autocomplete="service-description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>${serviceArrayDescription[key][itemKey]}</textarea>
                            </div>
                            <button onclick="removeServiceBtn('${id}')" class="text-red-500 background-transparent font-bold uppercase py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Remove</button>
                        </div>
                    `
                })
            })

            $('#display-service-edit').html(html);
        }

        function removeServiceBtn(id) {
            $('#' + id).remove();
        }

        function removeServiceClass(id) {
            $('#' + id).remove();
        }
    </script>

</x-app-layout>