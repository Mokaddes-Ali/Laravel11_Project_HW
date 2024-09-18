<x-app-layout>
    <div class="container mx-auto py-8 w-screen">
        <h1 class="text-2xl font-bold mb-6">Students List</h1>
        <table class="w-[1100px] bg-white border border-blue-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class=" border-b">ID</th>
                    <th class=" border-b">Name</th>
                    <th class=" border-b">Date of Birth</th>
                    <th class=" border-b">Gender</th>
                    <th class=" border-b">Address</th>
                    <th class=" border-b">Religion</th>
                    <th class=" border-b">Nationality</th>
                    <th class=" border-b">Email</th>
                    <th class=" border-b">Phone</th>
                    <th class="border-b">Parents Name</th>
                    <th class=" border-b">Parents Phone</th>
                    <th class=" border-b">Course</th>
                    <th class=" border-b">Admission Date</th>
                    <th class=" border-b">Admission Fee</th>
                    <th class=" border-b">Aditional Note</th>
                    <th class=" border-b">Profile Image</th>
                    <th class=" border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td class=" border-b">{{ $student->id }}</td>
                        <td class=" border-b">{{ $student->name }}</td>
                        <td class=" border-b">{{ $student->date_of_birth }}</td>
                        <td class=" border-b">{{ $student->gender }}</td>
                        <td class=" border-b">{{ $student->address }}</td>
                        <td class=" border-b">{{ $student->religion }}</td>
                        <td class=" border-b">{{$student->nationality }}</td>
                        <td class=" border-b">{{ $student->email }}</td>
                        <td class=" border-b">{{ $student->phone }}</td>
                        <td class=" border-b">{{  $student->parents_name }}</td>
                        <td class=" border-b">{{ $student->parents_phone }}</td>
                        <td class=" border-b">{{$student->course }}</td>
                        <td class="border-b">{{ $student->admission_date }}</td>
                        <td class=" border-b">{{$student->admission_fee }}</td>
                        <td class=" border-b">{{$student->aditional_note }}</td>
                        <td class=" border-b">
                            @if ($student->profile_image)
                                <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Profile Image" class="w-16 h-16 object-cover">
                            @else
                                No Image
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('students.edit', $student->id) }}" class="text-blue-500 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
