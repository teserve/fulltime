library(DBI)
library(RMySQL)
#mydb <- dbConnect(MySQL(), user='g1116887', password='12Blueapples', dbname='g1116887', host='mydb.itap.purdue.edu')
#on.exit(dbDisconnect(mydb))

mydb <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
#Creates data frames of Student, Student skills, Job posting and Job posting skills data from the SQL tables
Student <- data.frame(dbReadTable(mydb, "Student"))
Student[is.na(Student)] <- 0 
Student[Student ==""] <- 0

Student_skills <- data.frame(dbReadTable(mydb, "Student_skills"))
p <- 12
for (p in 12:21) { #makes student tech skill ratings a single number  
  Student_skills[,p] <- as.numeric(substr(as.character(Student_skills[,p]), 1, 1))
}
Student_skills[is.na(Student_skills)] <- 0
Student_skills[Student_skills ==""] <- 0

Job_posting <- data.frame(dbReadTable(mydb, "Job_posting"))
Job_posting[is.na(Job_posting)] <- -1 #made -1 instead of 0, so it doesn't match with empty Student_skill cells
Job_posting[Job_posting ==""] <- -1 

Job_skills <- data.frame(dbReadTable(mydb, "Job_skills"))
q <- 12
for (q in 12:21) { #makes job tech skill ratings a single number
  Job_skills[,q] <- as.numeric(substr(as.character(Job_skills[,q]), 1, 1))
}
Job_skills[is.na(Job_skills)] <- -1 #made -1 instead of 0, so it doesn't match with empty Student_skill cells
Job_skills[Job_skills ==""] <- -1

dbDisconnect(mydb)

#match score function
match <- function(stu_techskill, stu_techrate, stu_softskill, job_techskill, job_techrate, job_softskill, stu_gpa, job_gpa, stu_reg, job_reg, stu_ind, job_ind, stu_type, job_type, stu_edlevel, job_edlevel) {

  score1 <- 0
  i <- 1
  j <- 1
  k <- 1

  library(stringi)
  stu_techrate
  #Technical skill scaling
  for (i in 1:length(stu_techskill)) {
    for (j in 1:length(job_techskill)) {
      if (stu_techskill[i] == job_techskill[j]) {
        if(stu_techrate[i] >= job_techrate[j]) {
          score1 = score1 + (stu_techrate[i] - job_techrate[j] + 1)
          }
        }
    }
  }

  i <- 1
  j <- 1

  #Soft skill scaling
  for (i in 1:length(stu_softskill)) {
    for (j in 1:length(job_softskill)) {
      if (stu_softskill[i] == job_softskill[j]) {
          score1 = score1 + 1
      }
    }
  }

  #GPA scaling
  if (stu_gpa >= job_gpa) {
    score1 = score1 + (as.numeric(substr(stu_gpa, 1, 3))) - (as.numeric(substr(job_gpa, 1, 3)))
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
  y <- 1
  z <- 1

  #Max tech skill scaling
  for (z in 1:length(stu_techskill)) {
    maxscore = maxscore + (5 - job_techrate[z] + 1)
  }

  #Max soft skill scaling
  maxscore = maxscore + length(stu_softskill)

  #Max GPA, Region, Industry, Job Type & Education scaling
  maxscore = maxscore + (as.numeric(substr(stu_gpa, 1, 3))) - (as.numeric(substr(job_gpa, 1, 3))) + 3

  #Overall Student/Job posting matching score percentage
  score = (score1/maxscore) * 100
  
  return (score)
}

#initializes Matches data frame 
Matches <- data.frame("user_id" = integer(), "job_id" = integer(), "score" = integer())

#executes match score function for every job posting per student
a <- 1
b <- 1
for (a in 1:length(Student)) {
  for (b in 1:length(Job_posting)) {
    match(data.frame(Student_skills[a,2:11]), 
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
          Job_posting[b,6])
    
    #Adds matching score to the corresponding user_id and job_id in the Matches data frame
    Matches <- rbind(Matches, cbind(Student[a,1], Job_posting[b,2], score))
  }
}

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
