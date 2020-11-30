library(RMySQL)
# db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
# on.exit(dbDisconnect(db_connection))

# STUDENT DATA GENERATION ------------------------------------------------
n = 50

library(stringi)
email <- stri_rand_strings(n, 10)
email <- sapply(1:n, function(x) return(paste0(email[x], "@gmail.com")))

pass <- 1:n

cell <- rep("1234567890", times = n)

# generate random names for n students
library(randomNames)
fir_name <- randomNames(n, which.names = "first")
las_name <- randomNames(n, which.names = "last")

# generate gpa for n students
library(wakefield)
gpa <- gpa(n, mean = 85, sd = 4) # 85 corresponds to GPA of ~3.15

# generate region preferences for n students
region_list <- c("Midwest", "Southwest", "West", "Northeast", "Southeast")
region_prob <- c(0.681, 0.062, 0.117, 0.071, 0.069)
region <- sample(region_list, n, replace = T, prob = region_prob)

# generate industry preferences for n students
industry_list <- c(
  "Business-Related Fields",
  "Chemicals, Petroleum, Plastics & Rubber",
  "Computer Systems - Design/Programming",
  "Consulting Services",
  "Consumer Goods",
  "Energy",
  "Engineering Services",
  "Environmental Services",
  "Government",
  "Manufacturing & Industrial Systems",
  "Other",
  "Pharmaceuticals & Medicine",
  "Scientific Research & Development"
)
industry_prob <- c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610)
industry <- sample(industry_list, n, replace = T, prob = industry_prob)

# generate job type preferences for n students
type_list <- c("Internship", "Co-op", "Full-time")
job_type <- sample(type_list, n, replace = T, prob = c(0.4, 0.2, 0.4))

# generate education level for n students
school_year <- c("Freshman", "Sophomore", "Junior", "Senior")
ed_level <- sample(school_year, n, replace = T)

# Fill matching alg requirements in Student table
simulated_student_info <- data.frame(
  email,
  pass,
  cell,
  fir_name,
  las_name,
  gpa,
  region,
  industry,
  job_type,
  ed_level
)

# generate 10 technical skills for n students
db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
tech_skill_list <- dbReadTable(db_connection, "TechSkills")$skill_name
dbDisconnect(db_connection)

tech_skill_data <- matrix(nrow = n, ncol = 10)
for (i in 1:n) {
  tech_skill_data[i,] <- sample(tech_skill_list, 10, replace = F)
}
tech_skill_data <- data.frame(tech_skill_data)

# generate ranking for each of the 10 technical skills for n students
rating_list <- c("1: Beginner", "2: Basic", "3: Intermediate", "4: Advanced", "5: Expert")
for (i in 1:10) {
  tech_skill_data <- cbind(tech_skill_data, sample(rating_list, n, replace = T))
}
names(tech_skill_data) <- c(
  sapply(1:10, function(x) return(paste0("tech_skill", x))),
  sapply(1:10, function(x) return(paste0("tech_rate", x)))
)

# generate 10 soft skills for n students
db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
soft_skill_list <- dbReadTable(db_connection, "SoftSkills")$skill_name
dbDisconnect(db_connection)

soft_skill_data <- matrix(nrow = n, ncol = 10)
for (i in 1:n) {
  soft_skill_data[i,] <- sample(soft_skill_list, 10, replace = F)
}
soft_skill_data <- data.frame(soft_skill_data)
names(soft_skill_data) <- sapply(1:10, function(x) return(paste0("soft_skill", x)))


# Fill matching alg skill requirements in Student_skills table
simulated_student_skills <- cbind(tech_skill_data, soft_skill_data)


# JOB POSTING DATA GENERATION --------------------------------------------
#generate company name for n job postings
comp_names <- c("enVista", "Ford Motor Company", "Ingersoll Rand Inc.", "Amazon", 
                "Lockheed Martin", "Oracle Corporation", "United Parcel Service - UPS", "Eli Lilly & Company",
                "Anheuser-Busch InBev", "3M", "PepsiCo", "EY", "Deloitte", "American Axle & Manufacturing Inc.", 
                "Target", "Allison Transmission", "Eaton Corporation", "Trane Technologies", "Boeing", "Conagra Brands, Inc.",
                "Accenture", "GE", "John Deere", "Hormel Foods", "Cummins, Inc.")
company <- sample(comp_names, n, replace = T)

# generate gpa for n job postings
library(wakefield)
gpa <- gpa(n, mean = 85, sd = 4) # 85 corresponds to GPA of ~3.15

# generate region for n job postings
region_list <- c("Midwest", "Southwest", "West", "Northeast", "Southeast")
region_prob <- c(0.681, 0.062, 0.117, 0.071, 0.069)
region <- sample(region_list, n, replace = T, prob = region_prob)

# generate industry for n job postings
industry_list <- c(
  "Business-Related Fields",
  "Chemicals, Petroleum, Plastics & Rubber",
  "Computer Systems - Design/Programming",
  "Consulting Services",
  "Consumer Goods",
  "Energy",
  "Engineering Services",
  "Environmental Services",
  "Government",
  "Manufacturing & Industrial Systems",
  "Other",
  "Pharmaceuticals & Medicine",
  "Scientific Research & Development"
)
industry_prob <- c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610)
industry <- sample(industry_list, n, replace = T, prob = industry_prob)

# generate job type for n job postings
type_list <- c("Internship", "Co-op", "Full-time")
job_type <- sample(type_list, n, replace = T, prob = c(0.4, 0.2, 0.4))

# generate education level for n job postings
school_year <- c("Freshman", "Sophomore", "Junior", "Senior")
ed_level <- sample(school_year, n, replace = T)

# Fill matching alg requirements in Job_posting table
simulated_job_posting <- data.frame(
  company,
  gpa,
  region,
  industry,
  job_type,
  ed_level
)

# generate 10 technical skills for n job postings
db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
tech_skill_list <- dbReadTable(db_connection, "TechSkills")$skill_name
dbDisconnect(db_connection)

tech_skill_data <- matrix(nrow = n, ncol = 10)
for (i in 1:n) {
  tech_skill_data[i,] <- sample(tech_skill_list, 10, replace = F)
}
tech_skill_data <- data.frame(tech_skill_data)

# generate ranking for each of the 10 technical skills for n job postings
rating_list <- c("1: Beginner", "2: Basic", "3: Intermediate", "4: Advanced", "5: Expert")
for (i in 1:10) {
  tech_skill_data <- cbind(tech_skill_data, sample(rating_list, n, replace = T))
}
names(tech_skill_data) <- c(
  sapply(1:10, function(x) return(paste0("tech_skill", x))),
  sapply(1:10, function(x) return(paste0("tech_rate", x)))
)

# generate 10 soft skills for n students
db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
soft_skill_list <- dbReadTable(db_connection, "SoftSkills")$skill_name
dbDisconnect(db_connection)

soft_skill_data <- matrix(nrow = n, ncol = 10)
for (i in 1:n) {
  soft_skill_data[i,] <- sample(soft_skill_list, 10, replace = F)
}
soft_skill_data <- data.frame(soft_skill_data)
names(soft_skill_data) <- sapply(1:10, function(x) return(paste0("soft_skill", x)))

# Fill matching alg skill requirements in Job_skills table
simulated_job_skills <- cbind(tech_skill_data, soft_skill_data)


### DATA INSERTION

### To fix the foreign key constraint, do an entire student one at a time
### So that we can pull the last inserted id
for (i in 1:n) {
  tryCatch({
    db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
    dbBegin(db_connection)
    
    dbWriteTable(db_connection, name = "User", value = simulated_student_info[i, 1:5], append = T, row.names = F)
    id <- dbGetQuery(db_connection, "SELECT last_insert_id();")[1, 1]
    dbWriteTable(db_connection, name = "Student", value = cbind(user_id = id, simulated_student_info[i, 6:10]), append = T, row.names = F)
    dbWriteTable(db_connection, name = "Student_skills", value = cbind(user_id = id, simulated_student_skills[i, ]), append = T, row.names = F)

    dbCommit(db_connection)
    dbDisconnect(db_connection)
  },
  warning = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  },
  error = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  })
}


### Do the same for job postings as for the students
for (i in 1:n) {
  tryCatch({
    db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
    dbBegin(db_connection)
    
    dbWriteTable(db_connection, name = "User", value = simulated_student_info[i, 1:5], append = T, row.names = F)
    id2 <- dbGetQuery(db_connection, "SELECT last_insert_id();")[1, 1] 
    dbWriteTable(db_connection, name = "Job_posting", value = cbind(user_id = id2, simulated_job_posting[i, ]), append = T, row.names = F)
    jobid <- dbGetQuery(db_connection, "SELECT last_insert_id();")[1, 1] 
    dbWriteTable(db_connection, name = "Job_skills", value = cbind(job_id = jobid, simulated_job_skills[i, ]), append = T, row.names = F)
    
    dbCommit(db_connection)
    dbDisconnect(db_connection)
  },
  warning = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  },
  error = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  })
}

### This is a safety measure, it may throw an error bc the connection
### has already been closed
dbCommit(db_connection)
dbDisconnect(db_connection)


# # Student Courses DATA-------------------------------------------------
#Randomly generate 5 courses and 5 grades for n students
db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
course_list <- dbReadTable(db_connection, "Courses")$course_name
dbDisconnect(db_connection)

course_data <- matrix(nrow = n, ncol = 5)
for (i in 1:n) {
  course_data[i,] <- sample(course_list, 5, replace = F)
}
course_data <- data.frame(course_data)

grade <- c("A", "B", "C", "D", "F")
for (i in 1:5) {
  course_data <- cbind(course_data, sample(grade, n, replace = T, c(0.20, 0.35, 0.25, 0.15, 0.05)))
}
names(course_data) <- c(
  sapply(1:5, function(x) return(paste0("course", x))),
  sapply(1:5, function(x) return(paste0("course_grade", x)))
)

db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
userid <- dbReadTable(db_connection, "Student")$user_id
dbDisconnect(db_connection)

#Student Courses Data Insertion
for (i in 1:52) {
tryCatch({
  db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
  dbBegin(db_connection)
  
  dbWriteTable(db_connection, name = "Student_courses", value = cbind(user_id = userid[i],  course_data[i,]), append = T, row.names = F)
  
  dbCommit(db_connection)
  dbDisconnect(db_connection)
  },
  warning = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  },
  error = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  })
}

# # REVIEWS DATA-------------------------------------------------
# generate rating for n company job reviews
library(truncnorm)
library(stringi)
t <- 8

review_rating <- data.frame(round(rtruncnorm(n = t, a = 0, b = 5, mean = 3.4, sd = 0.5), digits = 1))
colnames(review_rating) <- c("review_rating")

# generate industry for n company job reviews
ind <- c(
  "Business-Related Fields", "Chemicals, Petroleum, Plastics & Rubber", "Computer Systems - Design/Programming",
  "Consulting Services", "Consumer Goods", "Energy", "Engineering Services", "Environmental Services",
  "Government", "Manufacturing & Industrial Systems", "Other", "Pharmaceuticals & Medicine", "Scientific Research & Development"
)
industry <- data.frame(sample(ind, t, replace = T, c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610)))
colnames(industry) <- c("industry")

# generate job type for n company job reviews
type <- c("Internship", "Co-op", "Full-time")
job_type <- data.frame(sample(type, t, replace = T, c(0.4, 0.2, 0.4)))
colnames(job_type) <- c("job_type")

review_bio <- stri_rand_lipsum(t)

# Fill review requirements in Reviews table
Reviews <- cbind(review_rating, industry, job_type, review_bio)


#Reviews Data Insertion
for (i in 1:t) {
  tryCatch({
    db_connection <- dbConnect(MySQL(), user = "g1116887", password = "12Blueapples", dbname = "g1116887", host = "mydb.itap.purdue.edu")
    dbBegin(db_connection)
    
    dbWriteTable(db_connection, name = "Reviews", value = cbind(user_id = userid[t],  Reviews[i,]), append = T, row.names = F)
    
    dbCommit(db_connection)
    dbDisconnect(db_connection)
  },
  warning = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  },
  error = function(cond) {
    dbRollback(db_connection)
    dbDisconnect(db_connection)
    print(cond)
  })
}
