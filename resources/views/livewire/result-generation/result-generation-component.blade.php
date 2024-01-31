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
                                        wire:model="semester_id"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    >
                                        <option value="">Select Exam</option>
                                        @foreach($semesters as $semester)
                                            <option value="{{ $semester->id }}">{{ $semester->name }}</option>
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
                                        <option value="">Select Exam</option>
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
                                    >
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto my-2 ">
                            <div class="flex flex-nowrap justify-center mt-2">
                                <div class="grid grid-rows-auto gap-0">
                                    <!-- School Header Starts-->
                                    <div id="schoolHeader" class="flex justify-around items-center px-3 gap-4">
                                        <div class="grid grid-rows-auto gap-1 py-2 text-center rounded ">
                                            <span class="text-2xl font-semibold uppercase">
                                                CHITTAGONG UNIVERSITY OF ENGINEERING & TECHNOLOGY
                                            </span>
                                            <span class="text-lg">
                                                Dept. of Computer Science & Engineering <br>
                                            </span>
                                            <span class="text-xl font-semibold uppercase">Grade Sheet</span>
                                        </div>
                                    </div>
                                    <!-- School Header Ends-->

                                    <!-- Student Profile Starts-->
                                    <div id="studentProfile" class="flex justify-between items-center prose-table:my-0 p-3 gap-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <!-- Left column (keys) -->
                                            <div class="text-gray-600">
                                                <span class="font-semibold text-lg">
                                                    Name <br>
                                                </span>
                                                <span class="font-semibold text-lg">
                                                    Student ID <br>
                                                </span>
                                                <span class="font-semibold text-lg">
                                                    Semester <br>
                                                </span>
                                                <span class="font-semibold text-lg">
                                                    Date of Enrollment <br>
                                                </span>
                                                <!-- Add more keys as needed -->
                                            </div>

                                            <!-- Right column (values) -->
                                            <div>
                                                <span class="text-lg">
                                                    : Name <br>
                                                </span>
                                                <span class="text-lg">
                                                    : Student Id <br>
                                                </span>
                                                <span class="text-lg">
                                                    : Semester <br>
                                                </span>
                                                <span class="text-lg">
                                                    : Date of Enrollment <br>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Student Profile Ends-->

                                    <!-- Academic Record Starts-->
                                    <div id="academicRecord" class="grid grid-rows-auto  prose-table:my-0 p-3 gap-1">
                                        <!-- Subject Scores Starts -->
                                        <table class="table-fixed border-collapse border border-slate-400 text-center  font-semibold">
                                            <thead>
                                                <tr>
                                                    <th class="p-2 border border-slate-400 text-sm text-left uppercase">Descriptive tile of the Courses</th>
                                                    <th class="border border-slate-400 text-sm">Course Number</th>
                                                    <th class="border border-slate-400 text-sm">Credit Hours</th>
                                                    <th class="border border-slate-400 text-sm">Grade Obtained</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="border border-slate-400 text-sm text-left px-2"><span>1</span></td>
                                                <td class="border border-slate-400 text-sm"><span>ENGLISH</span></td>
                                                <td class="border border-slate-400 text-sm"><span>10</span></td>
                                                <td class="border border-slate-400 text-sm"><span>10</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- Subject Scores Starts -->

                                        <br>
                                    </div>
                                    <!-- Academic Record Ends-->

                                    <!-- Non-Academic Record Starts-->
                                    <div class="grid grid-cols-3 p-3 gap-1">
                                        <!-- Score Guide Starts -->
                                        <table class="table-auto">
                                            <thead class="text-center">
                                                <tr>
                                                    <th class="border p-1  text-sm">Marks</th>
                                                    <th class="border p-1 text-sm">Letter Grade</th>
                                                    <th class="border p-1 text-sm">Grade Point</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($grades as $grade)
                                                <tr>
                                                    <td class="border px-1.5 text-sm"><span>{{$grade->title}}</span></td>
                                                    <td class="border p-0 text-sm text-center"><span>{{$grade->grade_letter}}</span></td>
                                                    <td class="border p-0 text-sm text-center"><span>{{$grade->grade_point}}</span></td>
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

                                        <div class="flex justify-between">
                                            <h2 class="mb-10 font-semibold">Date:</h2>
                                            <h2 class="font-semibold uppercase">Controller of the Examinations</h2>
                                        </div>
                                    </div>
                                    <!-- Remarks Ends -->
                                </div>
                            </div>
                        </div>
                    </div>

                @elseif($activeTab === 'Combined Result')
                    <div class="overflow-x-auto">
                        <div class=" mx-auto my-2 border rounded border-blue-500">

                            <div class="flex flex-nowrap justify-center">
                                <div class="grid grid-rows-auto gap-0">

                                    <!-- School Header Starts-->
                                    <div id="schoolHeader" class="flex justify-around items-center px-3 gap-4">
                                        <img class="w-24  rounded" src="https://via.placeholder.com/150"
                                             alt="school logo">

                                        <div class="grid grid-rows-auto gap-1 py-2 text-center rounded ">
                                            <span class="text-3xl font-semibold uppercase">Traiblazers Academy</span>
                                            <span class="text-base">
                        Motto: School very lenthy motto goes here <br>
                        School Address with the full street name goes here <br>
                        Tel: 070xxxxxxxxx, 090xxxxxxxxx <br>
                    </span>
                                            <span class="text-1xl font-semibold uppercase">Report Sheet</span>
                                        </div>

                                        <img class="w-24 rounded" src="https://via.placeholder.com/150"
                                             alt="student photo">
                                    </div>
                                    <!-- School Header Ends-->

                                    <!-- Student Profile Starts-->
                                    <div id="studentProfile" class="flex justify-between items-center prose-table:my-0 p-3 gap-4">
                                        <table class="table-fixed border-collapse border border-slate-400 uppercase font-semibold">
                                            <tbody>
                                            <tr>
                                                <td class="border border-slate-400 text-sm">SESSION: <span>2021-2022</span></td>
                                                <td class="border border-slate-400 text-sm">TERM: <span>SECOND TERM</span></td>
                                                <td class="border border-slate-400 text-sm">ADMISSION NO: TBAC/188/2022</td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm">NAME OF STUDENT: <span>STEPHEN JUDE</span></td>
                                                <td class="border border-slate-400 text-sm">CLASS: <span>JSS 1</span></td>
                                                <td class="border border-slate-400 text-sm">ROLL NO: 01</td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm">TEACHER: <span>MR. PAUL ADAH</span></td>
                                                <td class="border border-slate-400 text-sm">HOUSE: <span>MANCHESTER UNTED</span></td>
                                                <td class="border border-slate-400 text-sm">GENDER: MALE</td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm">NO OF TIMES SCHOOL OPENED: <span>110</span></td>
                                                <td class="border border-slate-400 text-sm">NO OF TME PRESENT: <span>110</span></td>
                                                <td class="border border-slate-400 text-sm">NEXT TERM BEGINS: 12/10/2022</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Student Profile Ends-->

                                    <!-- Academic Record Starts-->
                                    <div id="academicRecord" class="grid grid-rows-auto  prose-table:my-0 p-3 gap-1">
                                        <!-- Subject Scores Starts -->
                                        <table class="table-fixed border-collapse border border-slate-400 text-center uppercase font-semibold">
                                            <thead>
                                            <tr>
                                                <th class="border border-slate-400 text-sm">S/N</th>
                                                <th class="border border-slate-400 text-sm">SUBJECT</th>
                                                <th class="border border-slate-400 text-sm">1ST CAT<br> 20%</th>
                                                <th class="border border-slate-400 text-sm">2ND CAT<br> 20%</th>
                                                <th class="border border-slate-400 text-sm">3RD CAT<br> 20%</th>
                                                <th class="border border-slate-400 text-sm">CAT TOTAL<br> 20%</th>
                                                <th class="border border-slate-400 text-sm">EXAM <br> 40%</th>
                                                <th class="border border-slate-400 text-sm">1ST TERM<br> 100%</th>
                                                <th class="border border-slate-400 text-sm">2ND TERM<br> 100%</th>
                                                <th class="border border-slate-400 text-sm">3RD TERM<br> 100%</th>
                                                <th class="border border-slate-400 text-sm">CUMMULATIVE<br>SCORE</th>
                                                <th class="border border-slate-400 text-sm">SUBJECT<br> POSITION</th>
                                                <th class="border border-slate-400 text-sm">GRADE</th>
                                                <th class="border border-slate-400 text-sm">TEACHER'S<br> REMARK</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>1</span></td>
                                                <td class="border border-slate-400 text-sm"><span>ENGLISH</span></td>
                                                <td class="border border-slate-400 text-sm"><span>10</span></td>
                                                <td class="border border-slate-400 text-sm"><span>12</span></td>
                                                <td class="border border-slate-400 text-sm"><span>15</span></td>
                                                <td class="border border-slate-400 text-sm"><span>37</span></td>
                                                <td class="border border-slate-400 text-sm"><span>28</span></td>
                                                <td class="border border-slate-400 text-sm"><span>65</span></td>
                                                <td class="border border-slate-400 text-sm"><span>68</span></td>
                                                <td class="border border-slate-400 text-sm"><span>72</span></td>
                                                <td class="border border-slate-400 text-sm"><span>71.2</span></td>
                                                <td class="border border-slate-400 text-sm"><span>1st</span></td>
                                                <td class="border border-slate-400 text-sm"><span>A</span></td>
                                                <td class="border border-slate-400 text-sm"><span>Excellent</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- Subject Scores Starts -->

                                        <!-- Class Aggregates Starts -->
                                        <table class="table-fixed border-collapse border border-slate-400 text-center uppercase font-semibold">
                                            <thead>
                                            <tr>
                                                <th class="border border-slate-400 text-sm">TOTAL MARKS OBTAINABLE: <span>1100</span></th>
                                                <th class="border border-slate-400 text-sm">TOTAL MARKS OBTAINED: <span>1100</span></th>
                                                <th class="border border-slate-400 text-sm">CLASS AVERAGE: <br> <span>100%</span></th>
                                                <th class="border border-slate-400 text-sm">OVERALL PERCENTAGE: <br> <span>100</span></th>
                                                <th class="border border-slate-400 text-sm">GRADE: <br> <span>A</span></th>
                                            </tr>
                                            </thead>
                                        </table>
                                        <!-- Class Aggregates Ends -->

                                    </div>
                                    <!-- Academic Record Ends-->

                                    <!-- Non-Academic Record Starts-->
                                    <div id="nonAcademicRecord" class="grid grid-cols-3  prose-table:my-0 p-3 gap-1">
                                        <!-- Special Skills Starts -->
                                        <table class=" table-auto border-collapse border border-slate-400 uppercase font-semibold">
                                            <thead class="text-center">
                                            <tr>
                                                <th class="border border-slate-400 text-sm">SPECIFIC SKILLS</th>
                                                <th class="border border-slate-400 text-sm">RATING</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>ARTS</span></td>
                                                <td class="border border-slate-400 text-sm"><span>2</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>ATTITUDE</span></td>
                                                <td class="border border-slate-400 text-sm"><span>5</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>COURTESY</span></td>
                                                <td class="border border-slate-400 text-sm"><span>4</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>CREATIVE WRITING</span></td>
                                                <td class="border border-slate-400 text-sm"><span>2</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>PERSONAL HYGIENE</span></td>
                                                <td class="border border-slate-400 text-sm"><span>4</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>PERSONAL HYGIENE</span></td>
                                                <td class="border border-slate-400 text-sm"><span>3</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>READING SKILLS</span></td>
                                                <td class="border border-slate-400 text-sm"><span>5</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>SCIENTIFIC APTITUDE</span></td>
                                                <td class="border border-slate-400 text-sm"><span>4</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>SPORTS</span></td>
                                                <td class="border border-slate-400 text-sm"><span>3</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>VERBAL SKILLS</span></td>
                                                <td class="border border-slate-400 text-sm"><span>4</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- Special Skills Ends -->

                                        <!-- Rating Guide Starts -->
                                        <table class=" table-auto border-collapse border border-slate-400 uppercase font-semibold">
                                            <thead class="text-center">
                                            <tr>
                                                <th class="border border-slate-400 text-sm">RATING KEY</th>
                                                <th class="border border-slate-400 text-sm">RATING VALUE</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>EXCELLENT</span></td>
                                                <td class="border border-slate-400 text-sm"><span>5</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>VERY GOOD</span></td>
                                                <td class="border border-slate-400 text-sm"><span>4</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>GOOD</span></td>
                                                <td class="border border-slate-400 text-sm"><span>3</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>FAIR</span></td>
                                                <td class="border border-slate-400 text-sm"><span>2</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>POOR</span></td>
                                                <td class="border border-slate-400 text-sm"><span>1</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- Rating Guide Ends -->

                                        <!-- Score Guide Starts -->
                                        <table class="table-auto border-collapse border border-slate-400 uppercase font-semibold">
                                            <thead class="text-center">
                                            <tr>
                                                <th class="border border-slate-400 text-sm">GRADE REMARK</th>
                                                <th class="border border-slate-400 text-sm">GRADE</th>
                                                <th class="border border-slate-400 text-sm">SCORE FROM</th>
                                                <th class="border border-slate-400 text-sm">SCORE TO</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>Excellent</span></td>
                                                <td class="border border-slate-400 text-sm"><span>A</span></td>
                                                <td class="border border-slate-400 text-sm"><span>70</span></td>
                                                <td class="border border-slate-400 text-sm"><span>100</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>Good</span></td>
                                                <td class="border border-slate-400 text-sm"><span>B</span></td>
                                                <td class="border border-slate-400 text-sm"><span>60</span></td>
                                                <td class="border border-slate-400 text-sm"><span>69</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>Credit</span></td>
                                                <td class="border border-slate-400 text-sm"><span>C</span></td>
                                                <td class="border border-slate-400 text-sm"><span>50</span></td>
                                                <td class="border border-slate-400 text-sm"><span>59</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>Pass</span></td>
                                                <td class="border border-slate-400 text-sm"><span>D</span></td>
                                                <td class="border border-slate-400 text-sm"><span>40</span></td>
                                                <td class="border border-slate-400 text-sm"><span>49</span></td>
                                            </tr>
                                            <tr>
                                                <td class="border border-slate-400 text-sm"><span>Failed</span></td>
                                                <td class="border border-slate-400 text-sm"><span>F</span></td>
                                                <td class="border border-slate-400 text-sm"><span>0</span></td>
                                                <td class="border border-slate-400 text-sm"><span>39</span></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <!-- Score Guide Ends -->
                                    </div>
                                    <!-- Non-Academic Record Ends-->

                                    <!-- Remarks Starts -->
                                    <div id="remarks" class="prose-table:my-0 p-3 gap-1">
                                        <table class="table-auto border-collapse border border-slate-400 font-semibold">
                                            <thead>
                                            <tr>
                                                <th class="border border-slate-400 text-sm">
                                                    <span class="uppercase">Class Teacher's Remark: </span>
                                                    <span>He treats school property and the belongings of others with care and respect.</span>
                                                </th>
                                                <th class="border border-slate-400 text-sm">
                                                    <span class="uppercase">Signature: </span>
                                                    <span>A.D.</span>
                                                </th>
                                            </tr>
                                            <tr>
                                                <th class="border border-slate-400 text-sm">
                                                    <span class="uppercase">Head Teacher's Remark: </span>
                                                    <span>He treats school property and the belongings of others with care and respect.</span>
                                                </th>
                                                <th class="border border-slate-400 text-sm">
                                                    <span class="uppercase">Signature: </span>
                                                    <span>A.D.</span>
                                                </th>
                                            </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <!-- Remarks Ends -->

                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
</div>
