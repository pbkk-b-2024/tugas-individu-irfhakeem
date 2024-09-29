@extends('page-pertemuan-2.layout.base')

@section('title', 'Patients')

@section('content')
    <div class="flex justify-end items-center mb-5">
        <button id="addButton" class="bg-[#229799] px-4 py-[0.4rem] rounded-full items-center text-white">
            Add New
        </button>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
                <tr>
                    @foreach ($columns as $column)
                        <th scope="col" class="py-2 text-xs">
                            {{ ucfirst(str_replace('_', ' ', $column)) }}
                        </th>
                    @endforeach
                    <th scope="col" class="py-2 text-xs">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody id="myTable" class="text-center">
                @foreach ($patients as $patient)
                    <tr class="odd:bg-white even:bg-gray-50 border-b border-gray-200">
                        @foreach ($columns as $column)
                            <td class="py-2 whitespace-nowrap text-[12px]">
                                {{ $patient->$column }}
                            </td>
                        @endforeach
                        <td class="flex gap-3 py-2 justify-center">
                            <a href="{{ route('pasien.edit', $patient->patient_id) }}"
                                class="font-medium text-blue-600 hover:underline">Edit</a>
                            <button onclick="deletePatient({{ $patient->patient_id }})"
                                class="font-medium text-blue-600 hover:underline">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $patients->onEachSide(1)->links() }}
    </div>

    <div id="pasien_modal" class="fixed flex inset-0 items-center justify-center bg-black bg-opacity-50 z-50 hidden">
        <div class="p-10 bg-white rounded-lg shadow-lg max-w-3xl w-full">
            <form action="{{ route('pasien.add') }}" method="POST">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input type="nik" name="nik" id="nik" pattern="[0-9]{8}" autocomplete="off"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#229799] peer"
                        placeholder=" " required />
                    <label for="nik"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#229799]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        NIK</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input type="name" name="name" id="name" autocomplete="off"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#229799] peer"
                        placeholder=" " required />
                    <label for="name"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#229799]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama
                        Lengkap</label>
                </div>
                <div class="relative z-0 w-full mb-5 group">
                    <input id="tanggal_lahir" type="date" name="tanggal_lahir" autocomplete="off"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#229799] peer"
                        placeholder="" required>
                    <label for="tanggal_lahir"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#229799]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Tanggal Lahir</label>
                </div>

                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="email" name="email" id="email" autocomplete="off"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#229799] peer"
                            placeholder=" " required />
                        <label for="email"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-[#229799]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Email</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="no_hp" pattern="^08[0-9]{8,13}$" name="no_hp" id="no_hp" autocomplete="off"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-[#229799] peer"
                            placeholder=" " required />
                        <label for="no_hp"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-[#229799]  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Nomor HP</label>
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="jenis_kelamin" class="block mb-2 text-sm text-gray-500">Jenis Kelamin
                        </label>
                        <select id="jenis_kelamin" name="jenis_kelamin"
                            class="bg-white text-gray-500 text-sm focus:outline-none focus:ring-0 block w-full">
                            <option>L</option>
                            <option>P</option>

                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <label for="Golongan_darah" class="block mb-2 text-sm text-gray-500">Golongan Darah</label>
                        <select id="Golongan_darah" name="Golongan_darah"
                            class="bg-white text-gray-500 text-sm focus:outline-none focus:ring-0 block w-full">
                            <option>A</option>
                            <option>B</option>
                            <option>AB</option>
                            <option>O</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-end">
                    <button type="button" id="close_modal"
                        class="text-gray-700 bg-gray-200 hover:bg-gray-300 focus:ring-0 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mr-2">Close</button>
                    <button type="submit"
                        class="text-white bg-[#229799] hover:bg-[#317375] focus:ring-0 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                </div>
            </form>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('pasien_modal');
        const closeModalButton = document.getElementById('close_modal');
        const addButton = document.getElementById('addButton');

        // Function to open the modal
        function openModal() {
            modal.classList.remove('hidden');
        }

        // Function to close the modal
        function closeModal() {
            modal.classList.add('hidden');
        }

        // Event listener for the close button
        closeModalButton.addEventListener('click', closeModal);
        addButton.addEventListener('click', openModal);
    });

    async function deletePatient(patientId) {
        if (confirm('Are you sure you want to delete this patient with ID: ' + patientId + '?')) {
            try {
                const response = await fetch(`http://127.0.0.1:8000/api/delete-patient/${patientId}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer {{ Auth::user()->api_token }}'
                    },
                });

                const data = await response.json();

                if (response.ok) {
                    alert(data.message || 'Patient deleted successfully.');
                    location.reload();
                } else {
                    alert('Failed to delete the patient. ' + (data.message || 'Unknown error'));
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Something went wrong. Please try again later.');
            }
        }
    }
</script>@endsection
