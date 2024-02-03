<div>
    <section >
        <div class="max-w-screen-xl">
            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="px-2 text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:text-gray-400 dark:border-gray-700">
                    <ul class="flex flex-wrap -mb-px">
                        @foreach($tabs as $tab)
                            <li
                                class="me-2"
                            >
                                <a
                                    wire:click="changeTab('{{ $tab }}')"
                                    class="inline-block p-4 border-b-2 border-transparent rounded-t-lg {{ $activeTab !== $tab ? 'hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300' : 'text-blue-600 border-blue-600 active dark:text-blue-500 dark:border-blue-500' }}"
                                >
                                    {{ $tab }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>


                @if($activeTab === 'Individual Result')
                    <div class="overflow-x-auto">
                        <div class="border-b border-gray-200">
                            <div class="grid grid-cols-4 gap-4 px-6 py-4 justify-center items-end">
                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Student</h5>
                                    <livewire:student.student-autocomplete :selectedStudent="$selectedStudent ?? null" />
                                    @error('student_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Semester</h5>
                                    <select
                                        wire:model.live.debounce.50ms="semester_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Semester</option>
                                        @foreach($semesters as $item)
                                            <option
                                                value="{{ $item->id }}"
                                            >{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('semester_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="grid-cols-2">
                                    <h5 class="text-md text-start font-medium text-gray-900">Select Exam</h5>
                                    <select
                                        wire:model="exam_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="" disabled>Select Exam</option>
                                        @foreach($exams as $exam)
                                            <option value="{{ $exam->id }}">{{ $exam->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('exam_id') <span class="error text-red-600">{{ $message }}</span> @enderror
                                </div>

                                <div class="grid-cols-2">
                                    <button
                                        type="submit"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-lg justify-center items-end"
                                        wire:click="searchResult"
                                    >
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>

                        <x-html-print>
                            <div class="mx-auto my-2" id="printIndividualResult">

                                <div class="flex flex-nowrap justify-center mt-2">
                                    <div class="grid grid-rows-auto gap-0">
                                        <!-- School Header Starts-->
                                        <div id="schoolHeader" class="flex justify-around items-center px-3 gap-4">
                                            <div class="grid grid-rows-auto gap-1 py-2 text-center rounded ">
                                                <span class="text-xl font-semibold uppercase">
                                                    CHITTAGONG UNIVERSITY OF ENGINEERING & TECHNOLOGY
                                                </span>
                                                <div class="">
                                                    <select
                                                        wire:model.live.debounce.50ms="department_name"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                                    >
                                                        <option value="" disabled readonly>Select Department</option>
                                                        @foreach($departments as $department)
                                                            <option value="{{ $department->name }}">{{ $department->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <span class="text-lg">
                                                    Dept. of {{ $department_name }} <br>
                                                </span>
                                                <span class="text-xl font-semibold uppercase">Grade Sheet</span>
                                            </div>
                                        </div>
                                        <!-- School Header Ends-->

                                        <!-- Student Profile Starts-->
                                        <div id="studentProfile" class="flex justify-start items-center p-3 gap-4">
                                            <div class="grid grid-cols-2 gap-4">
                                                <!-- Left column (keys) -->
                                                <div class="text-gray-600 w-28">
                                                    <span class="font-semibold text-md">
                                                        Name <br>
                                                    </span>
                                                    <span class="font-semibold text-md">
                                                        Student ID <br>
                                                    </span>
                                                    <span class="font-semibold text-md">
                                                        Semester <br>
                                                    </span>
    {{--                                                <span class="font-semibold text-lg">--}}
    {{--                                                    Date of Enrollment <br>--}}
    {{--                                                </span>--}}
                                                    <!-- Add more keys as needed -->
                                                </div>

                                                <!-- Right column (values) -->
                                                <div class="">
                                                    <span class="text-md">
                                                        : {{ $student ? $student['name'] : '' }} <br>
                                                    </span>
                                                    <span class="text-md">
                                                        : {{ $student ? $student['roll'] : '' }}<br>
                                                    </span>
                                                    <span class="text-md">
                                                        : {{ $semester ? $semester['name'] : '' }} <br>
                                                    </span>
    {{--                                                <span class="text-lg">--}}
    {{--                                                    : Date of Enrollment <br>--}}
    {{--                                                </span>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Student Profile Ends-->

                                        <!-- Academic Record Starts-->
                                        <div id="academicRecord" class="grid grid-rows-auto p-3 gap-1">
                                            <!-- Subject Scores Starts -->
                                            <table class="table-fixed text-center">
                                                <thead>
                                                    <tr class="font-semibold">
                                                        <th class="p-2 border border-slate-400 text-sm text-left uppercase">Descriptive tile of the Courses</th>
                                                        <th class="border border-slate-400 text-sm">Course Number</th>
                                                        <th class="border border-slate-400 text-sm">Credit Hours</th>
                                                        <th class="border border-slate-400 text-sm">Grade Obtained</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($results as $result)
                                                        <tr>
                                                            <td class="border border-slate-400 text-sm text-left px-2"><span>{{ $result['subject_name'] }}</span></td>
                                                            <td class="border border-slate-400 text-sm text-left pl-10"><span>{{ $result['subject_code'] }}</span></td>
                                                            <td class="border border-slate-400 text-sm text-center"><span>{{ $result['credit_hours'] }}</span></td>
                                                            <td class="border border-slate-400 text-sm text-left pl-16"><span>{{ $result['grade_letter'] }}</span></td>
                                                        </tr>
                                                    @endforeach
                                                    @if($gpa)
                                                        <tr>
                                                            <td colspan="4" class="text-right text-md font-semibold pr-9">GPA = {{$gpa}}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <!-- Subject Scores Starts -->

                                            <br>
                                        </div>
                                        <!-- Academic Record Ends-->

                                        <!-- Non-Academic Record Starts-->
                                        <div class="grid grid-cols-3 p-3 gap-1 justify-end">
                                            <!-- Score Guide Starts -->
                                            <table class="table-auto">
                                                <thead class="text-center">
                                                    <tr>
                                                        <th class="border px-1.5 text-xs text-left">Marks</th>
                                                        <th class="border p-1 text-xs">Letter Grade</th>
                                                        <th class="border p-1 text-xs">Grade Point</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($grades as $grade)
                                                    <tr>
                                                        <td class="border px-1.5 text-xs"><span>{{$grade->title}}</span></td>
                                                        <td class="border p-0 text-xs pl-8 text-left"><span>{{$grade->grade_letter}}</span></td>
                                                        <td class="border p-0 text-xs pl-6 text-left"><span>{{$grade->grade_point}}</span></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <!-- Score Guide Ends -->
                                        </div>
                                        <!-- Non-Academic Record Ends-->

                                        <!-- Remarks Starts -->
                                        <div id="remarks" class="px-4">
                                            <div class="my-10">
                                                <p class="mb-10">Prepared by:</p>
                                                <p class="">Compared by:</p>
                                            </div>

                                            <div class="flex justify-between mb-10">
                                                <h2 class="font-semibold">Date:</h2>
                                                <h2 class="font-semibold uppercase">Controller of the Examinations</h2>
                                            </div>
                                        </div>
                                        <!-- Remarks Ends -->
                                </div>
                            </div>
                        </div>
                        </x-html-print>
                    </div>

                @elseif($activeTab === 'Combined Result')
                    <div class="overflow-x-auto">
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
