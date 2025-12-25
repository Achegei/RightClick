@php
    function navClass($route) {
        return request()->routeIs($route)
            ? 'bg-indigo-100 text-indigo-700 font-semibold'
            : 'text-gray-700 hover:bg-gray-100 hover:text-indigo-600';
    }
@endphp

<a href="{{ route('admin.dashboard') }}"
   class="flex items-center px-4 py-2 rounded-lg transition {{ navClass('admin.dashboard') }}">
    Dashboard
</a>

<a href="{{ route('admin.programs.index') }}"
   class="flex items-center px-4 py-2 rounded-lg transition {{ navClass('admin.programs.*') }}">
    Programs
</a>

<a href="{{ route('admin.courses.index') }}"
   class="flex items-center px-4 py-2 rounded-lg transition {{ navClass('admin.courses.*') }}">
    Courses
</a>

<a href="{{ route('admin.users.index') }}"
   class="flex items-center px-4 py-2 rounded-lg transition {{ navClass('admin.users.*') }}">
    Users
</a>
<a href="{{ route('admin.blogs.index') }}"
   class="flex items-center px-4 py-2 rounded-lg transition {{ navClass('admin.blogs.*') }}">
    Blogs
</a>
<a href="{{ route('admin.videos.index') }}"
   class="flex items-center px-4 py-2 rounded-lg transition {{ navClass('admin.blogs.*') }}">
    Videos
</a>
<a href="{{ route('admin.testimonials.index') }}"
   class="flex items-center px-4 py-2 rounded-lg transition {{ navClass('admin.blogs.*') }}">
    Testimonials
</a>


