from django.shortcuts import render
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
    return render(request, 'add.html')

def delete(request):
    return render(request, 'delete.html')

def studentupdate(request):
    return render(request, 'studentupdate.html')

def update(request):
    return render(request, 'update.html')

def studentinfo(request):
    
    return render(request, 'studentinfo.html')

def addstudent(request):
    return render(request, 'addstudent.html')
