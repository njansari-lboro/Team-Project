# 22COB290 Team Project

## Source Control with Git and GitHub

### Git

#### Branches
* A branch is a new/separate version of another branch (mostly `main`) in the repository
* They allow you to work on different parts of a project without impacting the `main` branch (usually the live version)
* When the work on a branch is complete, it can be merged with the main project
    * The branch can be deleted after this as it has served its purpose
* You can even switch between branches and work on different sections without them interfering with each other

#### Fetch
* This gets all the change history of a tracked branch

#### Merge
* This combines the current branch with another branch

* Example: merging `login-page` with `main`
    * If the `login-page` branch came directly from `main` and no other changes had been made to `main` while you were working, Git would see this as a continuation of `main`
        * It will then fast-forward and just point both branches to the same commit
        * `main` and `login-page` will essentially both be the same at this point
    * If the `main` branch, however, had changes made to it (such as to `index.html`) then the merge will fail and there would be a conflict between the two versions of `index.html` in each branch
        * Since the merge cannot be done automatically, you will have to fix any conflits manually
        * If in `index.html` there was a different line of code added in each branch, you would see this in the merge file:
            ```html
            <<<<<<< HEAD
            [line of code added in main]
            =======
            [line of code added in login-page]
            >>>>>>> login-page
            ```
        * You would then need to resolve the conflict which could be combining the two changes like this:
            ```html
            [line of code added in main]
            [line of code added in login-page]
            ```
        * This file can then be staged and committed, provided you definitely fixed the conflict

#### Pull
* This is how you keep up-to-date with all changes, including those made externally
* It is a combination of fetch and merge
    * All changes from the remote repository are pulled (fetched) and merged with the branch you are working on

#### Stage
* This is where you add files that are ready to be committed
* Whenever you hit a milestone or finish a part of the work, you should add the files to the staging environment

#### Commit
* Adding commits keep track of your progress and changes as you work.
* Git considers each commit a change point or "save point"
    * It is a point in the project you can go back to if you find a bug or want to make a change
* When you commit, you **need** to add a message
    * Add clear messages to each commit so it is easy for yourself (and others) to see what has changed and when

#### Push
* This pushes all your local changes (commits and branches) to GitHub

#### Pull Requests
* This notifies people that you have changes ready for them to consider or review
* They can review your changes or pull your contribution and merge it into their own branch
* Once your code has been "exhaustively tested", it can then be merged with the `main` branch

### GitHub-VS Code Integration

#### Setup
1. Install the `GitHub Repositories` extension
    * Have a read of the features if you want
2. Click on the Remote Explorer icon in the Activity Bar
3. Open a remote repository from GitHub
    * You will have to sign into GitHub
    * Choose the `njansari-lboro/Team-Project` repository to open it
4. You should see the repository contents in the Explorer

#### Usage
* Create, edit and delete files freely
* To see all changes, click on the Source Control icon in the Activity Bar
    * You can stage, unstage and discard changes from here
    * Select a file to open the diff editor
* Everything you do up until now is all local and won't affect the versions on GitHub
* When you're ready to commit the staged changes, enter a commit message and click Commit & Push
    * You may have to sync (pull and push) and fix any conflicts that arise 

* To manage branches, click on the branch button in the status bar (to the right of GitHub)
    * You can switch between branches or create a new one from this menu

### Notes
* **Always create a new branch when making something new (an idea, concept, component, etc.) or proposing a change**
    * Please do not edit the `main` branch directly
    * When we meet up, we will review changes and merge them with the `main` branch (and resolve any conflicts)
    * Hopefully, pushing to the `main` branch will trigger the deployment to the sci-project server
* **Please use descriptive branch names and commit messages**
    * We all need to understand what does what and be able to track our progress
    * It's important to have good commit messages because if we need to revert or reset to a previous commit, we know where to look
    * If a bug is also discovered, we can locate in which commit it has likely been created
* If you are committing multiple files but you think a single commit message won't cover all the changes, split up the commit
    * Only stage the files you want for each commit so that mutiple files with differing changes can be represented by separate commits
* An asterisk next to a branch name indicates that this is the branch you are currently on
    * Or in VS Code it means that the branch has uncommited changes
* Checking out a branch means moving from one branch to another

## Global CSS

* Variables and default implementations are included in the `pages/global.css` file
* 

### Usage
* 

### Colours
* 

### Fonts
* 

### Notes
* 
