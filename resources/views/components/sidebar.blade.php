<aside x-data="{ openMenu: false }" class="flex-shrink-0 w-[16%] flex-col border-r transition-all duration-300 hidden lg:block">
    <div class="w-[40%] lg:w-[16%] bg-normal px-2 h-screen fixed left-0 lg:top-20 overflow-y-scroll">
        <ul class="mb-24 w-full">
            <li class="py-1 cursor-pointer capitalize hover:text-brand">
                <p class="cursor-pointer capitalize p-3 flex justify-start text-brand font-bold" aria-expanded="false">
                    <x-heroicons::mini.solid.clipboard-document-list class="w-5 h-5" />
                    <span class="flex ml-2">
                        <a class="flex" href="/subjects">Subjects</a>
                    </span>
                </p>
            </li>
            <li class="py-1 cursor-pointer capitalize hover:text-brand">
                <p  class="cursor-pointer capitalize p-3 flex justify-start text-brand font-bold" aria-expanded="false">
                    <x-heroicons::mini.solid.user-group class="w-5 h-5" />
                    <span class="flex ml-2">
                        <a class="flex" href="/students">Students</a>
                    </span>
                </p>
            </li>
            <li class="py-1 cursor-pointer capitalize hover:text-brand">
                <p  class="cursor-pointer capitalize p-3 flex justify-start text-brand font-bold" aria-expanded="false">
                    <x-heroicons::mini.solid.rectangle-group class="w-5 h-5" />
                    <span class="flex ml-2">
                        <a class="flex" href="/student-subjects">Student Subjects</a>
                    </span>
                </p>
            </li>
            <li class="py-1 cursor-pointer capitalize hover:text-brand">
                <p  class="cursor-pointer capitalize p-3 flex justify-start text-brand font-bold" aria-expanded="false">
                    <x-heroicons::mini.solid.document-text class="w-5 h-5" />
                    <span class="flex ml-2">
                        <a class="flex" href="/marks">Marks</a>
                    </span>
                </p>
            </li>
            <li class="py-1 cursor-pointer capitalize hover:text-brand">
                <p  class="cursor-pointer capitalize p-3 flex justify-start text-brand font-bold" aria-expanded="false">
                    <x-heroicons::mini.solid.arrow-path-rounded-square class="w-5 h-5" />
                    <span class="flex ml-2">
                        <a class="flex" href="/result-generation">Result Generation</a>
                    </span>
                </p>
            </li>
            <li>
                <p @click="openMenu = !openMenu" class="cursor-pointer capitalize p-3 flex justify-start text-brand font-bold" aria-expanded="false">
                    <x-heroicons::mini.solid.cog-8-tooth class="w-5 h-5" />
                    <span class="flex ml-2 mr-3">
                        Settings
                    </span>
                    <svg :class="{ 'transform rotate-180': openMenu }" xmlns="http://www.w3.org/2000/svg" class="inline-block w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </p>
                <ul x-show="openMenu" class="px-3 py-3 bg-gray-200 rounded submenu_animate box-shadow">
                    <li class="py-1 cursor-pointer capitalize hover:text-brand">
                        <a class="flex" href="/faculties">Faculties</a>
                    </li>
                    <li class="py-1 cursor-pointer capitalize hover:text-brand">
                        <a class="flex" href="/departments">Departments</a>
                    </li>
                    <li class="py-1 cursor-pointer capitalize hover:text-brand">
                        <a class="flex" href="/semesters">Semesters</a>
                    </li>
                    <li class="py-1 cursor-pointer capitalize hover:text-brand">
                        <a class="flex" href="/exams">Exams</a>
                    </li>
                    <li class="py-1 cursor-pointer capitalize hover:text-brand">
                        <a class="flex" href="/grades">Grades</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>
