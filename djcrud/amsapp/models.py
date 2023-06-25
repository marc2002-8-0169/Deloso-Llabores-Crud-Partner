from django.forms import ModelForm, Textarea
from django.db import models

# Create your models here.
class Assignment(models.Model):
    assignment_id = models.IntegerField(primary_key=True)
    assignment_name = models.CharField(max_length=50)
    
    class Meta:
        managed = True
        db_table = 'assignment'

class Instructor(models.Model):
    instructor_id = models.IntegerField(primary_key=True)
    firstname = models.CharField(max_length=50)
    lastname = models.CharField(max_length=50)

    class Meta:
        managed = True
        db_table = 'instructor'

class Student(models.Model):
    student_id = models.IntegerField(primary_key=True)
    id_number = models.IntegerField(blank=True, null=True)
    firstname = models.CharField(max_length=50)
    lastname = models.CharField(max_length=50)
    gender = models.CharField(max_length=50)
    address = models.CharField(max_length=200)
    contact = models.IntegerField(max_length=200)
    course = models.IntegerField(blank=True, null=True)

    class Meta:
        managed = True
        db_table = 'student'

class Subject(models.Model):
    subject_id = models.IntegerField(primary_key=True)
    subject_name = models.CharField(max_length=50)
    
    class Meta:
        managed = True
        db_table = 'assignment'