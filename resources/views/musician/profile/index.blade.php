<x-layout>
    <x-slot:content>
        <div class="container mt-5" style="max-width: 900px; margin: 0 auto;">
            <div style="width: 100%; max-width: 900px;">
                <h1 class="mb-4 text-center" style="color: #333; font-size: 2rem; font-weight: bold;">My Profile</h1>

                @if (session('success'))
                    <div class="alert alert-success mb-4" style="font-size: 1rem; padding: 15px; border-radius: 5px; background-color: #d4edda; color: #155724;">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Card for Profile Information -->
                <div class="card shadow-sm mb-4" style="border-radius: 10px; border: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                    <div class="card-header bg-primary text-white" style="font-size: 1.25rem; font-weight: bold; padding: 15px;">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if ($musician)
                                    <table class="table table-striped table-hover table-bordered" style="border-radius: 5px; overflow: hidden; border: 1px solid #ddd;">
                                        <thead class="table-dark" style="background-color: #343a40; color: white;">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">First Name</th>
                                                <th scope="col">Last Name</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="font-size: 1rem; color: #555;">
                                                <th scope="row">{{ $musician->id }}</th>
                                                <td>{{ $musician->firstName }}</td>
                                                <td>{{ $musician->lastName }}</td>
                                                <td>{{ $musician->username }}</td>
                                                <td>{{ $musician->email }}</td>
                                                <td>
                                                    <span class="badge bg-primary" style="padding: 5px 10px; font-size: 1rem; font-weight: 600;">{{ ucfirst($musician->role) }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('musician.profile.edit', $musician->id) }}" class="btn btn-warning btn-sm" style="margin-right: 10px; padding: 8px 12px; font-size: 1rem; font-weight: bold; border-radius: 5px;">Edit</a>
                                                    <a href="{{ route('musician.profile.show', $musician->id) }}" class="btn btn-info btn-sm" style="padding: 8px 12px; font-size: 1rem; font-weight: bold; border-radius: 5px;">Show</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert alert-warning" style="font-size: 1rem; padding: 15px; border-radius: 5px; background-color: #fff3cd; color: #856404;">No profile found for this user.</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button for creating new profile -->
                <div class="text-end">
                    <a href="{{ route('musician.profile.create') }}" class="btn btn-primary" style="padding: 12px 20px; font-size: 1rem; font-weight: bold; border-radius: 5px;">Create New Profile</a>
                </div>
            </div>
        </div>
    </x-slot:content>
</x-layout>


