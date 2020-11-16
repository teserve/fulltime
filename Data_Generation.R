library(RMySQL)
mydb <- dbConnect(MySQL(), user='g1116887', password='12Blueapples', dbname='g1116887', host='mydb.itap.purdue.edu')
on.exit(dbDisconnect(mydb))

#STUDENT DATA------------------------------------------------
#generate random names for 100 students
library(randomNames)
randomNames(57, 0) #male
randomNames(43, 1) #female

#generate gpa for 100 students
library(wakefield)
gpa(100, mean = 85, sd = 4, name = "GPA")

#generate region preferences for 100 students
region <- c("Midwest", "Southwest", "West", "Northeast", "Southeast")
sample(region, 100, replace = T, prob = c(0.681, 0.062, 0.117, 0.071, 0.069))

#generate industry preferences for 100 students
industry <- c("Business-Related Fields", "Chemicals, Petroleum, Plastics & Rubber", "Computer Systems - Design/Programming", 
              "Consulting Services", "Consumer Goods", "Energy", "Engineering Services", "Environmental Services",
              "Government", "Manufacturing & Industrial Systems", "Other", "Pharmaceuticals & Medicine", "Scientific Research & Development")
sample(industry, 100, replace = T, c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610))

#generate job type preferences for 100 students
type <- c("Internship", "Co-op", "Full-time")
sample(type, 100, replace = T)

#generate education level for 100 students
ed_level <- c("Bachelor's Degree", "Master's Degree", "Docterate's Degree")
sample(ed_level, 100, replace = T)

#generate 10 technical skills for 100 students
tech_skill <- c("Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)", "Algorithms", 
                "Architecture and engineering (CAD software)", "Auditing", "BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)", 
                "Backend development", "Budget planning", "C#", "C/C++", "Cloud computing", "Content Management Systems (CMS)",
                "Cost and trend analysis", "Data management and analytics", "Data modeling", "ERP systems", "Front-end development",
                "GAAP and FASB knowledge", "Google Suite (Docs, Sheets, Slides, Forms, etc.)", "HTML", "Java", "JavaScript",
                "Journalism and writing: Content Management Systems", "Foreign language", "Marketing analytics tools",
                "Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)", "Network structure and security", "PHP",
                "PM tools (JIRA, Trello, Monday.com, etc.)", "Perl", "Photoshop, Illustrator, Adobe CS, and InDesign",
                "Product lifecycle management", "Project management and planning", "Prototyping", "Python", "R", "Risk management",
                "Ruby", "SQL", "Salesforce", "Scrum and Agile", "Search Engine Optimization (SEO)", "Shipping and transportation: Logistics management software",
                "Social marketing", "Statistics and probability", "Swift", "System design", "Task management", "Technical writing and reporting",
                "UI/UX", "Website design", "Zapier")
replicate(100, sample(tech_skill, 10, replace = F))

#generate ranking for each of the 10 technical skills for 100 students
if (ed_level == "Bachelor's Degree") {
  replicate(100, sample(1:5, 10, replace = T, c(0.10, 0.20, 0.50, 0.15, 0.05)))
} if (ed_level == "Master's Degree") {
  replicate(100, sample(1:5, 10, replace = T), c(0.10, 0.10, 0.15, 0.50, 0.15))
} if (ed_level == "Docterate's Degree") {
  replicate(100, sample(1:5, 10, replace = T), c(0.05, 0.10, 0.15, 0.20, 0.50))
}

#generate 10 soft skills for 100 students
soft_skill <- c("Accountability", "Adaptability", "Collaborative", "Communication skills", 
                "Conflict resolution", "Creativity", "Critical problem solving", "Decisiveness",
                "Dependability", "Flexibility", "Honesty", "Innovation", "Integrity", "Logical reasoning",
                "Leadership", "Organization", "Patience", "People management", "Perseverance", "Planning",
                "Positive work ethic", "Public speaking/presentation skills", "Punctuality", "Reliability", 
                "Responsibility", "Results-oriented", "Self-motivated", "Teamwork", "Time management skills", 
                "Willingness to learn new things", "Work well under pressure")
replicate(100, sample(soft_skill, 10, replace = F))


#JOB POSTING DATA--------------------------------------------
#generate gpa for 100 job postings
library(wakefield)
gpa(100, mean = 83, sd = 4, name = "GPA")

#generate region for 100 job postings
region <- c("Midwest", "Southwest", "West", "Northeast", "Southeast")
sample(region, 100, replace = T, prob = c(0.681, 0.062, 0.117, 0.071, 0.069))

#generate industry for 100 job postings
industry <- c("Business-Related Fields", "Chemicals, Petroleum, Plastics & Rubber", "Computer Systems - Design/Programming", 
              "Consulting Services", "Consumer Goods", "Energy", "Engineering Services", "Environmental Services",
              "Government", "Manufacturing & Industrial Systems", "Other", "Pharmaceuticals & Medicine", "Scientific Research & Development")
sample(industry, 100, replace = T, c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610))

#generate job type for 100 job postings
type <- c("Internship", "Co-op", "Full-time")
sample(type, 100, replace = T)

#generate education level for 100 job postings
ed_level <- c("Bachelor's Degree", "Master's Degree", "Docterate's Degree")
sample(ed_level, 100, replace = T)

#generate 10 technical skills for 100 job postings
tech_skill <- c("Accounting and finance tools (SAP, Oracle, Bookkeeping software etc.)", "Algorithms", 
                "Architecture and engineering (CAD software)", "Auditing", "BI tools and applications (datapine, SAS, SAP, MicroStrategy, etc.)", 
                "Backend development", "Budget planning", "C#", "C/C++", "Cloud computing", "Content Management Systems (CMS)",
                "Cost and trend analysis", "Data management and analytics", "Data modeling", "ERP systems", "Front-end development",
                "GAAP and FASB knowledge", "Google Suite (Docs, Sheets, Slides, Forms, etc.)", "HTML", "Java", "JavaScript",
                "Journalism and writing: Content Management Systems", "Foreign language", "Marketing analytics tools",
                "Microsoft Office (Excel, PowerPoint, Power BI, SharePoint, Word, etc.)", "Network structure and security", "PHP",
                "PM tools (JIRA, Trello, Monday.com, etc.)", "Perl", "Photoshop, Illustrator, Adobe CS, and InDesign",
                "Product lifecycle management", "Project management and planning", "Prototyping", "Python", "R", "Risk management",
                "Ruby", "SQL", "Salesforce", "Scrum and Agile", "Search Engine Optimization (SEO)", "Shipping and transportation: Logistics management software",
                "Social marketing", "Statistics and probability", "Swift", "System design", "Task management", "Technical writing and reporting",
                "UI/UX", "Website design", "Zapier")
replicate(100, sample(tech_skill, 10, replace = F))

#generate ranking for each of the 10 technical skills for 100 job postings
if (ed_level == "Bachelor's Degree") {
  replicate(100, sample(1:5, 10, replace = T, c(0.10, 0.20, 0.50, 0.15, 0.05)))
} if (ed_level == "Master's Degree") {
  replicate(100, sample(1:5, 10, replace = T), c(0.10, 0.10, 0.15, 0.50, 0.15))
} if (ed_level == "Docterate's Degree") {
  replicate(100, sample(1:5, 10, replace = T), c(0.05, 0.10, 0.15, 0.20, 0.50))
}

#generate 10 soft skills for 100 postings
soft_skill <- c("Accountability", "Adaptability", "Collaborative", "Communication skills", 
                "Conflict resolution", "Creativity", "Critical problem solving", "Decisiveness",
                "Dependability", "Flexibility", "Honesty", "Innovation", "Integrity", "Logical reasoning",
                "Leadership", "Organization", "Patience", "People management", "Perseverance", "Planning",
                "Positive work ethic", "Public speaking/presentation skills", "Punctuality", "Reliability", 
                "Responsibility", "Results-oriented", "Self-motivated", "Teamwork", "Time management skills", 
                "Willingness to learn new things", "Work well under pressure")
replicate(100, sample(soft_skill, 10, replace = F))


#EMPLOYER DATA------------------------------------------------
#generate random names for 100 employers
library(randomNames)
randomNames(100)


#REVIEWS DATA-------------------------------------------------
#generate rating for 50 company job reviews 
ratings <- seq(0, 5, by = 0.5)
sample(ratings, 50, replace = T)
#round(rnorm(10, mean = 3.4), digits = 2)) *need an upper & lower bound

#generate industry for 50 company job reviews 
industry <- c("Business-Related Fields", "Chemicals, Petroleum, Plastics & Rubber", "Computer Systems - Design/Programming", 
              "Consulting Services", "Consumer Goods", "Energy", "Engineering Services", "Environmental Services",
              "Government", "Manufacturing & Industrial Systems", "Other", "Pharmaceuticals & Medicine", "Scientific Research & Development")
sample(industry, 50, replace = T, c(0.061, 0.018, 0.079, 0.128, 0.226, 0.018, 0.189, 0.012, 0.012, 0.183, 0.037, 0.031, 0.610))

#generate job type for 50 company job reviews 
type <- c("Internship", "Co-op", "Full-time")
sample(type, 50, replace = T)


#EMPLOYER ANALYTICS---------------------------------------------


#ADMIN ANALYTICS---------------------------------------------



