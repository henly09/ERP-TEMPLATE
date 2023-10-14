<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Voucher Request') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-3xl font-bold pt-4 pb-2 px-4">Edit New Voucher Request</h1>
                <h6 class="font-italic px-4"> Edit this form for the existing voucher request....</h6>
                <div class="flex justify-center py-5">
                <form id="createVouch" class="w-full max-w-5xl" action="{{ route('vouchreq.saveEdit', ['id' => $vouchreqs->id])}}" method="POST">
                @csrf
                @method('PATCH')
                <div class="flex justify-center">
                    <div class="flex -mx-3 mb-6 flex-grow">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="cust_id">
                            Customer's Name
                        </label>
                        <select name="cust_id" id="cust_id" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" required>
                                <option value="">Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}" @if ($customer->id == $vouchreqs->cust_id) selected @endif>
                                            {{ $customer->name }}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center">
                    <div class="flex -mx-3 mb-6 flex-grow">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="particulars">
                            Particulars
                        </label>
                        <input value="{{ $vouchreqs->particulars }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="particulars" name="particulars" type="text" placeholder="Officia temporibus est corporis." required>
                        </div>
                    </div>
                    <div class="flex -mx-3 mb-6 flex-grow">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="numericValue">
                            Amount
                        </label>
                        <input
                            class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                            id="numericValue"
                            name="numericValue"
                            type="text"
                            placeholder="₱ 100,000.00"
                            required
                        >   
                        <input type="hidden" id="amount" name="amount">
                       </div>
                    </div>
                </div>
                    <div class="flex justify-center">
                    <div class="flex flex-grow -mx-3 mb-6">
                        <div class="w-full md:w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="requested_by">
                            Requested By
                        </label>
                        <input value="{{ $vouchreqs->requested_by }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="requested_by"  name="requested_by" type="text" placeholder="Ex. John Doe" required>
                        </div>
                    </div>
                    <div class="flex flex-grow -mx-3 mb-6">
                        <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="check_by">
                            Checked By
                        </label>
                        <input value="{{ $vouchreqs->check_by }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="check_by" name="check_by" placeholder="Ex. Flor De Luna" required>
                        </div>
                    </div>
                    </div>

                    <div class="flex flex-wrap -mx-3 mb-5 pb-11">
                        <div class="w-full px-1 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" required rows="6" cols="40" for="comments">
                            Comments
                        </label>
                        <textarea id="comments" name="comments" class="appearance-none block w-full h-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="Comments.........">{{ $vouchreqs->comments }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-center mt-11">
                        <button
                            onclick="window.history.back()"
                            type="button"
                            class="flex-wrap px-10 py-4 bg-red-500 hover:bg-red-600 text-white font-medium uppercase rounded-3xl shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-400 mr-2"
                        >
                        <i class="fa-solid fa-xmark mr-2"></i>Cancel
                        </button>
                        <button
                            type="submit"
                            class="flex-wrap px-10 py-4 bg-green-500 hover:bg-green-600 text-white font-medium uppercase rounded-3xl shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-400 ml-2"
                        >
                        <i class="fa-solid fa-circle-check mr-2"></i>Submit
                        </button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        window.onload = function() {
            displayValue2();
        };

        $(document).ready(function() {
            $('#numericValue').inputmask('currency', {
                radixPoint: '.',
                groupSeparator: ',',
                autoGroup: true,
                digits: 2,
                digitsOptional: false,
                rightAlign: false,
                prefix: '₱ ', // You can add currency symbols or prefixes here if needed
                allowMinus: false // Remove this line if you want to allow negative numbers
            });
        });

        const createVouchForm = document.getElementById("createVouch");

        createVouchForm.addEventListener("submit", function(event){
            event.preventDefault();
            swal();
        });
        
        function displayValue() {
            const amountInput = document.getElementById("numericValue");
            const inputValue = parseInt(amountInput.value.replace(/[₱,]/g, ''));
            const numericValueInput = document.getElementById("amount");
            numericValueInput.value = inputValue;
        }

        function swal(){
            Swal.fire({
                title: 'Submit Form?',
                text: 'Are you sure you want to save this voucher request details?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ff0000',
                confirmButtonText: 'Yes',
                cancelButtonText: 'No',
            }).then((result) => {
                if (result.isConfirmed) {
                    displayValue();
                    createVouchForm.submit(); 
                }
            });
        }

        function displayValue2() {
            var amountOutput = {{ $vouchreqs->amount }};
            amountOutput = amountOutput.toFixed(2);
            amountOutput = '₱ ' + amountOutput.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ','); 
            document.getElementById("numericValue").value = amountOutput;
        }

    </script>
    
</x-app-layout>