from django.shortcuts import render, redirect
from django.contrib.auth.models import Students
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth.forms import AuthenticationForm


def main(request):
    sqlstatement= "SELECT assignment.assignment_id AS 'Assignment no.', assignment.assignment_name AS 'Assignment', subject.subject_name AS 'Subject',CONCAT(instructor.firstname, ' ', instructor.lastname) AS 'Instructor', status.status_name AS 'Status' FROM assignment INNER JOIN subject ON assignment.assignment_id = subject.subject_id INNER JOIN instructor ON assignment.assignment_id = instructor.instructor_id INNER JOIN status ON assignment.assignment_id = status.status_id"
    joined_data = sqlstatement.objects.all()
    return render(request, 'amsapp/main.html', {'data': joined_data })

def signup(request):
    if request.method == 'POST':
        form = UserCreationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('login')
    else:
        form = UserCreationForm()
    return render(request, 'signup.html', {'form': form})

def login(request):
    if request.method == 'POST':
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('main')
    else:
        form = AuthenticationForm()
    return render(request, 'login.html', {'form': form})

def add(request):
    if request.method == 'POST':
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('add')
    else:
        form = AuthenticationForm()
    return render(request, 'add.html', {'form': form})

def delete(request):
    if request.method == 'POST':
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('delete')
    else:
        form = AuthenticationForm()
    return render(request, 'delete.html', {'form': form}))

def studentupdate(request):
    if request.method == 'POST':
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('studentupdate')
    else:
        form = AuthenticationForm()
    return render(request, 'studentupdate.html', {'form': form})

def update(request):
    if request.method == 'POST':
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('update')
    else:
        form = AuthenticationForm()
    return render(request, 'update.html', {'form': form})

def studentinfo(request):
    studentInfo = Students.objects.all()
    return render(request, 'studentinfo.html', {'users': studentInfo})

def addstudent(request):
    if request.method == 'POST':
        form = AuthenticationForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect('addstudent')
    else:
        form = AuthenticationForm()
    return render(request, 'addstudent.html', {'form': form})
