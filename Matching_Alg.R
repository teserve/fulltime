library(RMySQL)
mydb <- dbConnect(MySQL(), user='g1116887', password='12Blueapples', dbname='g1116887', host='mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))

match <- function(stu_techskill, stu_techrate, stu_softskill, job_techskill, job_techrate, job_softskill, stu_gpa, job_gpa, stu_reg, job_reg, stu_ind, job_ind, stu_type, job_type, stu_edlevel, job_edlevel) {

  score <- 0
  i <- 1
  j <- 1
  k <- 1

  #Technical skill scaling
  for (i in 1:length(stu_techskill)) {
    for (j in 1:length(job_techskill)) {
      if (stu_techskill[i] == job_techskill[j]) {
        if(stu_techrate[i] >= job_techrate[j]) {
          score = score + (stu_techrate[i] - job_techrate[j] + 1)
          }
        }
      j = j + 1
    }
    i = i + 1
  }

  i <- 1
  j <- 1

  #Soft skill scaling
  for (i in 1:length(stu_softskill)) {
    for (j in 1:length(job_softskill)) {
      if (stu_softskill[i] == job_softskill[j]) {
          score = score + 1
      }
      j = j + 1
    }
    i = i + 1
  }

  #GPA scaling
  if (stu_gpa >= job_gpa) {
    score = score + (stu_gpa - job_gpa)
  }

  #Region scaling
  if (stu_reg == job_reg) {
    score = score + 1
  }

  #Job type scaling
  if (stu_type == job_type) {
    score = score + 1
  }
  
  #Industry scaling
  if (stu_ind == job_ind) {
    score = score + 1
  }
  
  #Education level scaling
  if (stu_edlevel < job_edlevel) {
    score = score - 1
  }
  
  
  y <- 1
  z <- 1
  maxscore <- 0

  #Max tech skill scaling
  for (z in 1:length(stu_techskill)) {
    maxscore = maxscore + (5 - job_techrate[z] + 1)
    z = z + 1
  }

  #Max soft skill scaling
  maxscore = maxscore + length(stu_softskill)

  #Max GPA, Region, Industry, Job Type & Education scaling
  maxscore = maxscore + (stu_gpa - job_gpa) + 3

  #Overall Student/Job posting matching score percentage
  score_per = (score/maxscore) * 100
  
  return (score_per)
}