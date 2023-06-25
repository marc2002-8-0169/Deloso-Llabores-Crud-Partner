from django.shortcuts import render
from django.contrib.auth.forms import UserCreationForm
from django.contrib.auth.forms import AuthenticationForm

def main(request):
    return render(request, 'main.html')

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
