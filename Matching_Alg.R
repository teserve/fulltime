library(DBI)
library(RMySQL)

mydb <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")

#Reads Student SQL table and changes NA values or blanks to 0
Student <- data.frame(dbReadTable(mydb, "Student"))
Student[is.na(Student)] <- 0 
Student[Student ==""] <- 0

#make student GPA a numeric value
Student[,9] <- as.numeric(substr(as.character(Student[,9]), 1, 3)) 

#change student education levels to numeric values
for (w in 1:nrow(Student)) {
  if (Student[w,11] == "Freshman") {
    Student[w,11] <- 1
  }
  if (Student[w,11] == "Sophomore") {
    Student[w,11] <- 2
  }
  if (Student[w,11] == "Junior") {
    Student[w,11] <- 3
  }
  if (Student[w,11] == "Senior") {
    Student[w,11] <- 4
  }
}

#Reads Student_skills SQL table and changes NA values or blanks to 0
Student_skills <- data.frame(dbReadTable(mydb, "Student_skills"))

#makes student tech skill ratings a single number  
for (p in 12:21) { 
  Student_skills[,p] <- as.numeric(substr(as.character(Student_skills[,p]), 1, 1))
}
Student_skills[is.na(Student_skills)] <- 0
Student_skills[Student_skills ==""] <- 0


#Reads Job_posting SQL table and changes NA values or blanks to -1 so they don't match with NA or blanks in Student table
Job_posting <- data.frame(dbReadTable(mydb, "Job_posting"))
Job_posting[is.na(Job_posting)] <- -1 
Job_posting[Job_posting ==""] <- -1 

#make job posting GPA a numeric value
Job_posting[,7] <- as.numeric(substr(as.character(Job_posting[,7]), 1, 3)) 

#change job posting education levels to numeric values
for (q in 1:nrow(Job_posting)) {
  if (Job_posting[q,6] == "Freshman") {
    Job_posting[q,6] <- 1
  }
  if (Job_posting[q,6] == "Sophomore") {
    Job_posting[q,6] <- 2
  }
  if (Job_posting[q,6] == "Junior") {
    Job_posting[q,6] <- 3
  }
  if (Job_posting[q,6] == "Senior") {
    Job_posting[q,6] <- 4
  }
}

#Reads Job_skills SQL table and changes NA values or blanks to -1 so they don't match with NA or blanks in Student_skills table
Job_skills <- data.frame(dbReadTable(mydb, "Job_skills"))

#makes job posting tech skill ratings a single number
for (q in 12:21) { 
  Job_skills[,q] <- as.numeric(substr(as.character(Job_skills[,q]), 1, 1))
}
Job_skills[is.na(Job_skills)] <- -1 
Job_skills[Job_skills ==""] <- -1


dbDisconnect(mydb)


#match score function
match <- function(stu_techskill, stu_techrate, stu_softskill, job_techskill, job_techrate, job_softskill, stu_gpa, job_gpa, stu_reg, job_reg, stu_ind, job_ind, stu_type, job_type, stu_edlevel, job_edlevel) {

  score1 <- 0

  #Technical skill scaling
  for (i in 1:10) {
    for (j in 1:10) {
      if (stu_techskill[i] == job_techskill[j]) {
        if(stu_techrate[i] >= job_techrate[j]) {
          score1 = score1 + (stu_techrate[i] - job_techrate[j] + 1)
        }
      }
    }
  }

  #Soft skill scaling
  for (i in 1:10) {
    for (j in 1:10) {
      if (stu_softskill[i] == job_softskill[j]) {
        score1 = score1 + 1
      }
    }
  }

  #GPA scaling
  if (stu_gpa >= job_gpa) {
    score1 = score1 + stu_gpa - job_gpa
  }

  #Region scaling
  if (stu_reg == job_reg) {
    score1 = score1 + 1
  }

  #Job type scaling
  if (stu_type == job_type) {
    score1 = score1 + 1
  }
  
  #Industry scaling
  if (stu_ind == job_ind) {
    score1 = score1 + 1
  }
  
  #Education level scaling
  if (stu_edlevel < job_edlevel) {
    score1 = score1 - 1
  }
  
  maxscore <- 0

  #Max tech skill scaling
  for (z in 1:10) {
    maxscore = maxscore + (5 - job_techrate[z] + 1)
  }

  #Max soft skill scaling
  maxscore = maxscore + length(stu_softskill)

  #Max GPA, Region, Industry, Job Type & Education scaling
  maxscore = maxscore + (stu_gpa - job_gpa) + 3

  #Overall Student/Job posting matching score percentage
  score = (score1/maxscore) * 100
  
  return (score)
}

#initializes Matches data frame 
#Matches <- data.frame("user_id" = integer(), "job_id" = integer(), "score" = integer())

#executes match score function for every job posting per student
for (a in 1:nrow(Student)) {
  for (b in 1:nrow(Job_posting)) {
    
    #Adds matching score to the corresponding user_id and job_id in the Matches data frame
    Matches <- rbind(Matches, cbind(Student[a,1], Job_posting[b,2], match(data.frame(Student_skills[a,2:11]), 
                                                                          data.frame(Student_skills[a, 12:21]), 
                                                                          data.frame(Student_skills[a, 22:31]), 
                                                                          data.frame(Job_skills[b,2:11]), 
                                                                          data.frame(Job_skills[b, 12:21]), 
                                                                          data.frame(Job_skills[b, 22:31]), 
                                                                          Student[a,9], 
                                                                          Job_posting[b,7], 
                                                                          Student[a,13], 
                                                                          Job_posting[b,8], 
                                                                          Student[a,15], 
                                                                          Job_posting[b,3], 
                                                                          Student[a,14], 
                                                                          Job_posting[b,5], 
                                                                          Student[a,11], 
                                                                          Job_posting[b,6])))
  }
}

Matches <- `colnames<-`(Matches, c("user_id", "job_id", "score"))

#Match score insert
mydb <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
dbBegin(mydb)

tryCatch({
  dbWriteTable(mydb, name = "Matches", value = Matches[,], append = T, row.names = F)
  },
  warning = function(cond) {
    dbRollback(mydb)
    dbDisconnect(mydb)
  },
  error = function(cond) {
    dbRollback(mydb)
    dbDisconnect(mydb)
})
    
dbCommit(mydb)
dbDisconnect(mydb)
